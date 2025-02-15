<?php require "blocks/header.php"; ?>

<?php if(isset($_SESSION['user_id'])): ?>
    <a class="btn" href="profile.php">Личный кабинет</a>
<?php else: ?>
  
<?php endif; ?>



<?php
require "db.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

  
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

   
    if ($user && password_verify($password, $user["password"])) {
        setcookie("user", $user["username"], time() + 3600, "/"); // Создаем куки на 1 час
        header("Location: index.php"); 
        exit();
    } else {
        echo "Ошибка: Неверный email или пароль!";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('img/background.php') no-repeat center center fixed;
            background-size: cover;}        
    </style>
</head>
<body>

<div class="container">
    <div class="login-container">
        <h2 class="text-center">Авторизация</h2>
        <form action="login_process.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Запомнить меня</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Вход</button>
        </form>
        <p class="text-center mt-3">У вас нет аккаунта? <a href="register.php">Регистрация</a></p>
    </div>
</div>

</body>
</html>

