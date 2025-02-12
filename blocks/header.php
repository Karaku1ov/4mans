<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 font-weight-normal">itProger</h5>
    <div class="d-flex ms-auto align-items-center"> <nav class="my-2 my-md-0">
            <a class="p-2 text-dark" href="#">Gargo</a>
            <a class="p-2 text-dark" href="#">Контакты</a>
        </nav>
        <?php if(isset($_COOKIE['user']) && $_COOKIE['user'] != ''): ?>
            <a class="btn btn-outline-primary ms-3" href="auth.php">Кабинет пользователя</a> 
            <?php else: ?>
                <a class="btn btn-outline-primary ms-3" href="auth.php">Войти</a> 
         <?php endif; ?>
        </div>
</div>