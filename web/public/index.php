<?php

include "../app/vendor/autoload.php";

use App\Controller\Controller;

$controller = new Controller();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AIS3</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script defer src="assets/js/script.js"></script>
</head>
<body>
<?php include('../app/src/view/navigation.blade.php') ?>
<main>
    <?php
        echo "hello world";
    ?>
</main>
<?php include('../app/src/view/footer.blade.php') ?>
</body>
</html>