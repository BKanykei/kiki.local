<?php

require_once './koko.php';

if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add'])) {
    $last_name = $_POST['last_name'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $group_name = $_POST['group_name'];
    $birthday = $_POST['birthday'];
    $about = $_POST['about'];
    $photo = '';

    if (!empty($_FILES["photo"]["name"])) {
        $fileName = time() . "_" . basename($_FILES["photo"]["name"]);
        $uploadPath = "uploads/" . $fileName;
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES["photo"]["type"], $allowedTypes)) {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadPath)) {
                $photo = $uploadPath;
            }
        }
    }

    $stmt = $pdo->prepare("INSERT INTO entries (last_name, name, age, group_name, birthday, about, photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$last_name, $name, $age, $group_name, $birthday, $about, $photo]);
    header("Location: index.php");
    exit;
}


if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    $stmt = $pdo->prepare("SELECT photo FROM entries WHERE id = ?");
    $stmt->execute([$id]);
    $oldPhoto = $stmt->fetchColumn();
    if ($oldPhoto && file_exists($oldPhoto)) {
        unlink($oldPhoto);
    }

    $pdo->prepare("DELETE FROM entries WHERE id = ?")->execute([$id]);
    header("Location: index.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $last_name = $_POST['last_name'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $group_name = $_POST['group_name'];
    $birthday = $_POST['birthday'];
    $about = $_POST['about'];

    if (!empty($_FILES["photo"]["name"])) {
        $fileName = time() . "_" . basename($_FILES["photo"]["name"]);
        $uploadPath = "uploads/" . $fileName;
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES["photo"]["type"], $allowedTypes)) {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadPath)) {
                $stmt = $pdo->prepare("SELECT photo FROM entries WHERE id = ?");
                $stmt->execute([$id]);
                $oldPhoto = $stmt->fetchColumn();
                if ($oldPhoto && file_exists($oldPhoto)) {
                    unlink($oldPhoto);
                }

                $stmt = $pdo->prepare("UPDATE entries SET last_name=?, name=?, age=?, group_name=?, birthday=?, about=?, photo=? WHERE id=?");
                $stmt->execute([$last_name, $name, $age, $group_name, $birthday, $about, $uploadPath, $id]);
            }
        }
    } else {
        $stmt = $pdo->prepare("UPDATE entries SET last_name=?, name=?, age=?, group_name=?, birthday=?, about=? WHERE id=?");
        $stmt->execute([$last_name, $name, $age, $group_name, $birthday, $about, $id]);
    }
    header("Location: index.php");
    exit;
}

$entries = $pdo->query("SELECT * FROM entries ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <h2>Добавить человека</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="text" name="last_name" placeholder="Фамилия" required>
        <input type="text" name="name" placeholder="Имя" required>
        <input type="number" name="age" placeholder="Возраст" required>
        <input type="text" name="group_name" placeholder="Группа">
        <input type="date" name="birthday" placeholder="Дата рождения">
        <input type="text" name="about" placeholder="Описание" required>
        <input type="file" name="photo">
        <input type="submit" name="add" value="Сохранить">
    </form>

    <h2>Список людей</h2>
    <?php foreach ($entries as $entry): ?>
        <div class="entry">
            <?php if ($entry['photo']): ?>
                <img src="<?= htmlspecialchars($entry['photo']) ?>" alt="Фото">
            <?php endif; ?>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $entry['id'] ?>">
                <input type="text" name="last_name" value="<?= htmlspecialchars($entry['last_name']) ?>" required>
                <input type="text" name="name" value="<?= htmlspecialchars($entry['name']) ?>" required>
                <input type="number" name="age" value="<?= htmlspecialchars($entry['age']) ?>" required>
                <input type="text" name="group_name" value="<?= htmlspecialchars($entry['group_name']) ?>">
                <input type="date" name="birthday" value="<?= htmlspecialchars($entry['birthday']) ?>">
                <input type="text" name="about" value="<?= htmlspecialchars($entry['about']) ?>" required>
                <input type="file" name="photo">
                <input type="submit" name="update" value="Изменить">
                <a href="index.php?delete=<?= $entry['id'] ?>" style="color:red;">Удалить</a>
            </form>
        </div>
    <?php endforeach; ?>
</body>
</html>
