<div class="container-fluid padding" id="demo">
    <div class="row text-center">
        <div class="welcome">
            <div class="col-12">
                <h1 class="display-4">Демонстрация</h1>
                <hr>
            </div>
            <div class="col-12">

                <?php
                    Main();
                    if (isset($_SESSION['result'])) {
                        echo "<div>";

                        if ($_SESSION['result'] !== "Невалидни данни.") {
                            echo "<h5>Следващия път, когато ще има такъв ъгъл между стрелките е:</h5><br/>";
                        }

                        echo "<h5 class='highlight'>". $_SESSION['result'] . "</h5>";
                        echo "</div>";
                    }
                ?>

                <form action="" method="post">
                    <div class="d-flex justify-content-center">
                        <label for="angle">Въведете ъгъл</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input id="angle" name="angle" type="text" required>
                    </div>
                    <small>Граници: <span class="highlight">0&deg; - 180&deg;</span></small>
                    <br>
                    <small>Формат: <span class="highlight">число</span></small>

                    <div class="d-flex justify-content-center">
                        <label for="time">Въведете час, минути и секунди</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input id="time" name="time" type="text" required>
                    </div>
                    <small>Граници: <span class="highlight">12:00:00 - 11:59:59</span></small>
                    <br>
                    <small>Формат: <span class="highlight">чч:мм:сс</span></small>

                    <br>
                    <br>
                    <div class="d-flex justify-content-center">
                        <input id="submit" name="submit" type="submit" value="Изчисли">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>