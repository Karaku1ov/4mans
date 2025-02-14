<?php
$host = "127.0.0.1"; // Или "localhost"
$dbname = "my_database"; // Название базы данных
$username = "root"; // Пользователь (по умолчанию в XAMPP — root)
$password = ""; // В XAMPP пароль по умолчанию пустой

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>
