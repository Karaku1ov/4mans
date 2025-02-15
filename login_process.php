<?php
session_start();
require 'db.php'; // Подключение к базе данных

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Проверяем, есть ли такой email в базе
    $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Авторизация успешна – сохраняем данные в сессии
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        setcookie('user', $user['username'], time() + 3600, "/"); // Куки на 1 час

        header("Location: profile.php"); // Перенаправляем в личный кабинет
        exit();
    } else {
        echo "<script>alert('Неверный email или пароль!'); window.location.href='login.php';</script>";
    }
}
?>
