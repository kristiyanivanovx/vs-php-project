
<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Clock Hand Angle 2 Проект, изготвен от Кристиян Иванов. Възложен от Враца Софтуер." />
    <meta name="Keywords" content="clock, hand, angle, clockHandAngle2, project, php, vratsa, software, community" />
    <title>
        Clock Hand Angle 2 - Кристиян Иванов
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="static/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico">
    <script src="https://kit.fontawesome.com/c952ac5cde.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!-- Navigation-->

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">

    <img class="logo" src="static/logo.png">
    <span class="spanOne">Clock Hand Angle 2</span><span class="spanFive"></span><span class="spanFour"> - Кристиян Иванов</span></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i id="bars" class="fa fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Начало</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#demo">Демонстрация</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="#about">За проекта</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container-fluid padding" id="demo">
    <div class="row text-center">
        <div class="welcome">
            <div class="col-12">
                <h1 class="display-4">Демонстрация</h1>
                <hr>
            </div>
            <div class="col-12">
                <?php require 'project.php'?>

                <?php
                    Main();
                    if (isset($GLOBALS['result'])) {
                        echo "<div>";
                        echo "<h5>Следващия път, когато ще има такъв ъгъл между стрелките е:</h5><br/>";
                        echo "<h5>". $GLOBALS['result'] . "</h5>";
                        echo "<br><br></div>";
                    }

                ?>

                <form action="" method="post">
                    <div class="d-flex justify-content-center">
                        <label for="angle">Въведете ъгъл</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input id="angle" name="angle" type="text" required>
                    </div>

                    <div class="d-flex justify-content-center">
                        <label for="time">Въведете час, минути и секунди</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input id="time" name="time" type="text" required>
                    </div>

                    <br>
                    <div class="d-flex justify-content-center">
                        <input id="submit" name="submit" type="submit" value="Изчисли">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--- Welcome Section -->

<div class="container-fluid padding" id="about">
    <div class="row text-center">
        <div class="welcome">
            <div class="col-12">
                <h1 class="display-4">Описание на проекта</h1>
                <hr>
            </div>
            <div class="col-12">
                <p class="lead">
                    Втренчили сте се в часовника, мислейки за задачата <span class="highlight">Clock Hand Angle</span>.
                    Чудите се след колко време, стрелките на часовника ще застанат, образувайки ъгъл със същата големина като сега и искате да напишете алгоритъм,
                    който ще определи този момент.
                </p>
                <p class="lead">
                    Като имате ъгъл /в градуси/ и времето сега - timeNow, дадено във формат hh:mm:ss,
                    вашата задача е да намерите кога стрелките на часовника /показващи час и минути/ ще застанат в същия ъгъл.
                </p>
                <p class="lead">
                    Като резултат дайте времето в същия формат, закръглено надолу към най-близката секунда.
                </p>
                <p class="lead">
                    Проект на Кристиян Иванов. Възложен от Враца Софтуер Общество.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

<footer class="col-12 text-center">
<!--    <div class="container-fluid">-->
    <h6 class="footer-bottom-text">2020. Clock Hand Angle 2. Кристиян Иванов.</h6>
</footer>
<!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>