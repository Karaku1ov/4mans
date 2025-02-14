<?php require "blocks/header.php"; ?>


<div class="container mt-5">
    <h2>Вход</h2>
    <form action="auth.php" method="POST">
        <input type="email" name="email" class="form-control mt-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mt-2" placeholder="Пароль" required>
        <button type="submit" class="btn btn-primary mt-3">Войти</button>
    </form>
</div>

<?php
require "db.php"; // Подключаем базу данных

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Подготовленный запрос на получение пользователя по email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Проверяем, есть ли такой пользователь и совпадает ли пароль
    if ($user && password_verify($password, $user["password"])) {
        setcookie("user", $user["username"], time() + 3600, "/"); // Создаем куки на 1 час
        header("Location: index.php"); // Перенаправляем на главную страницу
        exit();
    } else {
        echo "Ошибка: Неверный email или пароль!";
    }
}
?>
