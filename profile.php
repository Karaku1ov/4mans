<?php require "blocks/header.php"; ?>
<?php

session_start();
require 'db.php'; // Подключаем базу данных

// Проверяем, вошел ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php"); // Перенаправляем на страницу входа
    exit();
}

// Получаем данные пользователя
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Ошибка: Пользователь не найден!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="styles.css"> <!-- Подключаем стили -->
</head>
<body>
    <div class="container">
        <h2>Личный кабинет</h2>
        <p><strong>Имя:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <a href="logout.php" class="btn">Выйти</a>
    </div>
    <style>
        body {
            background: url('img/background.php') no-repeat center center fixed;
            background-size: cover;}        
    </style>
</body>

</html>
