<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Mans Cargo - Карго-доставка</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
   
</head>
<body>
<link rel="stylesheet" href="css/style.css">

<?php require("blocks/header.php");?>


<div class="hero">
    <h1>Быстрая и надежная карго-доставка</h1>
    <p>Доставляем товары из Китая, Европы, США и других стран</p>
    <a href="register.php" class="btn btn-custom">Оставить заявку</a>
</div>

<div class="container">
<section id="about" class="container mt-5">
    <h2>О нас</h2>
    <p>Компания 4Mans Cargo занимается международной карго-доставкой грузов, обеспечивая надежность, скорость и выгодные тарифы. Мы работаем с различными странами и предлагаем полный комплекс логистических услуг.</p>
</section>
</div>
<?php require"blocks/delivery_methods.php"?>
<div class="container mt-5"> 
    <h3 class="mb-5">Способы доставки</h3>
    <div class="d-flex flex-wrap justify-content-center"> 
        <?php for ($i = 0; $i < count($delivery_methods); $i++) : ?>   
            <div class="card mb-4 rounded-3 shadow-sm" style="width: 18rem; margin: 10px;">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><?php echo $delivery_methods[$i]["title"]; ?></h4>
                </div>
                <div class="card-body">
                    <img src="img/<?php echo ($i + 1)?>.jpg" class="img-thumbnail">
                    <p class="mt-3"><?php echo $delivery_methods[$i]["desc"]; ?></p>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary" onclick="window.location.href='details.php?id=<?php echo $i; ?>'">Подробнее</button>

                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>

<section id="contact" class="container mt-5">
    <h2>Свяжитесь с нами</h2>
    <form action="send_message.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Ваш Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Сообщение:</label>
            <textarea name="message" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-custom">Отправить</button>
    </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
<?php require("blocks/footer.php");?>
</html>
