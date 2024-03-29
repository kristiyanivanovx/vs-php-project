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
        Clock Hand Angle 2
    </title>
    <script src="https://kit.fontawesome.com/c952ac5cde.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="static/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico">
    <!-- bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- bootstrap 4.0 -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"-->
    <!--          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
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

</body>
</html>