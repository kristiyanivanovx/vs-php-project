<?php session_start(); ?>
<?php require 'project/project.php' ?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description"
          content="Clock Hand Angle 2 Проект, изготвен от Кристиян Иванов. Възложен от Враца Софтуер."/>
    <meta name="Keywords" content="clock, hand, angle, clockHandAngle2, project, php, vratsa, software, community"/>
    <title>
        Clock Hand Angle 2 - Кристиян Иванов
    </title>
    <script src="https://kit.fontawesome.com/c952ac5cde.js" crossorigin="anonymous"></script>
<!--    <script src="./js/index.js"></script>-->
    <link rel="manifest" href="./manifest.webmanifest">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="static/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!-- Navigation -->

<?php include 'partials/navigation.php' ?>

<!--  Demonstration Section -->

<?php include 'partials/demonstration.php' ?>

<!-- Description Section -->

<?php include 'partials/description.php' ?>

<!-- Footer -->

<?php include 'partials/footer.php' ?>

<!-- Scripts -->

<?php include 'partials/scripts.php' ?>

<script>
    if ('serviceWorker' in navigator) {
       navigator.serviceWorker.register('./js/service-worker.js');
    }
</script>

</body>
</html>