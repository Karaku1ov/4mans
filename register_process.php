<?php
session_start();
require 'db.php'; // Подключение к базе данных

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Проверяем, есть ли уже такой email
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);

    if ($stmt->fetch()) {
        echo "<script>alert('Этот email уже зарегистрирован!'); window.location.href='register.php';</script>";
        exit();
    }

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->execute([
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword
    ]);

    echo "<script>alert('Регистрация успешна! Теперь войдите.'); window.location.href='register_process.php';</script>";
}
?>
