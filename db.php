<?php
$host = 'localhost';  // Хост (обычно localhost)
$dbname = 'my_database'; // Имя вашей базы данных
$username = 'root'; // Логин (по умолчанию root)
$password = ''; // Пароль (по умолчанию пустой)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>
