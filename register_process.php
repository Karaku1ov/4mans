<?php
require "db.php"; // Подключаем базу данных

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Хешируем пароль

    // Проверяем, есть ли уже такой email в БД
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetch()) {
        die("Ошибка: Этот email уже зарегистрирован!");
    }

    // Вставляем нового пользователя
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo "Вы успешно зарегистрировались! <a href='login.php'>Войти</a>";
    } else {
        echo "Ошибка при регистрации!";
    }
}
?>
