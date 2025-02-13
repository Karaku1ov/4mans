<?php require "blocks/delivery_methods.php"; 
    $id = (int)$_GET["id"];
    $method = $delivery_methods[$id];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $method["title"]; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<?php require "blocks/header.php"; ?>

<div class="container mt-5">
    <h1><?php echo $method["title"]; ?></h1>
    <img src="<?php echo $method["img"]; ?>" class="img-fluid">
    <p class="mt-3"><?php echo $method["desc"]; ?></p>
    <a href="index.php" class="btn btn-primary">Назад</a>
</div>

<?php require "blocks/footer.php"; ?>
</body>
</html>
