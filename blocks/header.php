
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">4Mans Cargo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Главная</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">О нас</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Личный кабинет</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Выйти</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="register.php">Регистрация</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth.php">Вход</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>