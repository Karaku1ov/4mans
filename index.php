<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Php website</title>
</head>
<body>
<?php
    require "blocks/delivery_methods.php";
    $title = "Способы доставки";
    require "blocks/header.php";
?>

<?php require"blocks/header.php"?>


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


<?php require"blocks/footer.php"?>
</body>
</html>
