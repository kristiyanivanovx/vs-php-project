<?php

/**
 * @param $hours
 * @param $minutes
 * @param $seconds
 * @return string
 */
function calcAngle($hours, $minutes, $seconds): string
{
    // calculate the angles between the hour and minute hands with reference to 12:00
    $hour_angle = 30 * $hours + (30 * ($minutes + $seconds / 60) / 60);
    $minute_angle = 6 * $minutes + (6 * $seconds / 60);

    // find the difference between two angles
    $angle = abs($hour_angle - $minute_angle);

    // return the smaller angle of the two possible angles
    $angle = min(360 - $angle, $angle);

    return $angle;
}

// 1. get input
// 2. increase time, check if angle /almost/ matches
// 3. if it matches, print it

/**
 * @param $angle
 * @param $timeNow
 * @return string
 */
function clockHandAngle2($angle, $timeNow): string
{
    // if angle is not numeric and out of bounds
    if ($angle > 180 || $angle < 0 ||
        (is_string($angle) && !is_numeric($angle))
    ) {
        return "Невалидни данни.";
    }

    // to do: check if time is numeric and in range, finish up
    try {
        list($hours, $minutes, $seconds) = explode(":", $timeNow);
    }
    catch (Exception $e) {
        return "Невалидни данни.";
    }

    while (true) {
        // validations
        if ($seconds >= 60) {
            $minutes += 1;
            $seconds -= 60;
        }

        if ($minutes >= 60) {
            $hours += 1;
            $minutes -= 60;
        }

        if ($hours > 12) {
            $hours -= 12;
        }

        $new_angle = calcAngle($hours, $minutes, $seconds);

        $margin_of_error = 0.09;

        if (abs($new_angle - $angle) < $margin_of_error) {
            if ((strlen($hours)) < 2) {
                $hours = "0" . $hours;
            }

            if ((strlen($minutes)) < 2) {
                $minutes = "0" . $minutes;
            }

            if ((strlen($seconds)) < 2) {
                $seconds = "0" . $seconds;
            }

            return "$hours:$minutes:$seconds";
        }
        else {
            $seconds += 1;
        }
    }
}

function Main(): void
{
    if (isset($_POST['angle']) && isset($_POST['time'])) {
        $_SESSION['result'] = clockHandAngle2($_POST['angle'], $_POST['time']);
    }
}

// tests
function TestCHA()
{
    echo "1. ", calcAngle(12, 00, 00), "<br>-> Expected: 0<br><br>";
    echo "2. ", calcAngle(3, 00, 00), "<br>-> Expected: 90<br><br>";
    echo "3. ", calcAngle(6, 00, 00), "<br>-> Expected: 180<br><br>";
    echo "4. ", calcAngle(3, 45, 00), "<br>-> Expected: 157,5<br><br>";
    echo "5. ", calcAngle(4, 50, 00), "<br>-> Expected: 155<br><br>";
    echo "6. ", calcAngle(2, 05, 30), "<br>-> Expected: 29,75<br><br>";
    echo "7. ", calcAngle(12, 00, 01), "<br>-> Expected: 0.09166666666667425<br><br>";
    echo "8. ", calcAngle(8, 10, 12), "<br>-> Expected: 176,1<br><br>";
    echo "9. ", calcAngle(7, 46, 11), "<br>-> Expected: 44.008333333333326<br><br>";
    echo "10. ", calcAngle(1, 42, 01), "<br>-> Expected: 158.90833333333333<br><br>";
    echo "11. ", calcAngle(10, 33, 34), "<br>-> Expected: 115.38333333333332<br><br>";
    echo "12. ", calcAngle(6, 49, 55), "<br>-> Expected: 94.54166666666666<br><br>";
    echo "13. ", calcAngle(12, 44, 33), "<br>-> Expected: 114.97500000000002<br><br>";
}

function TestCHA2()
{
    echo "1. ", clockHandAngle2(0, "12:00:00"), "<br>-> Expected: 12:00:00<br><br>"; // gives 12:00:00
    echo "2. ", clockHandAngle2(0, "12:00:01"), " <br>-> Expected: 1:05:27<br><br>"; // gives 1:05:27
    echo "3. ", clockHandAngle2(30, "12:54:17"), "<br>-> Expected: 1:00:00<br><br>"; // gives 1:00:00
    echo "4. ", clockHandAngle2(90, "12:00:00"), "<br>-> Expected: 12:16:21<br><br>"; // gives 12:16:21
    echo "5. ", clockHandAngle2(57, "11:14:54"), "<br>-> Expected: 11:49:38<br><br>"; // gives 11:49:38
    echo "6. ", clockHandAngle2(5, "10:54:06"), "<br>-> Expected: 10:55:27<br><br>"; // gives 10:55:27
    echo "7. ", clockHandAngle2(180, "12:30:00"), "<br>-> Expected: 12:32:43<br><br>"; // gives 12:32:43
    echo "8. ", clockHandAngle2(129, "5:09:00"), "<br>-> Expected: 5:50:43<br><br>"; // gives 5:50:43
    echo "9. ", clockHandAngle2(11, "8:45:54"), "<br>-> Expected: 9:47:05<br><br>"; // gives 9:47:05
}

//TestCHA();
//TestCHA2();
