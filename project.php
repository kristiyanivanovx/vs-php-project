<?php

// my version
/**
 * @param $hours
 * @param $minutes
 * @return string
 */
function calcAngleKV($hours, $minutes): string
{
    $subtotal_angle = abs(0.5 * (60 * $hours - 11 * $minutes));

    if ($subtotal_angle > 180) {
        $subtotal_angle = 360 - $subtotal_angle;
    }

    return abs($subtotal_angle);
}

// geeks for geeks version, modified
/**
 * @param $hours
 * @param $minutes
 * @param $seconds
 * @return mixed
 */
function calcAngle($hours, $minutes, $seconds)
{
    // validate the input
    if ($hours < 0 || $minutes < 0 || $minutes > 60
//        || $hours > 12
    ) {
        echo "Wrong input";
    }

//    if ($hours == 12) {
//        $hours = 0;
//    }

    if ($minutes == 60) {
        $minutes = 0;
        $hours += 1;

        if ($hours > 12) {
            $hours -= 12;
        }
    }

    // Calculate the angles moved by hour and minute hands with reference to 12:00
    // $hour_angle = 0.5 * ($hours * 60 + $minutes);
    // $minute_angle = 6 * $minutes;

    $minute_angle = 6 * $minutes + (6 * $seconds / 60);
    $hour_angle = 30 * $hours + (30 * ($minutes + $seconds / 60) / 60);

    // Find the difference between two angles
    $angle = abs($hour_angle - $minute_angle);

    // Return the smaller angle  of two possible angles
    $angle = min(360 - $angle, $angle);

    return $angle;
}

// 1. get input
// 2. increase time, check if angle matches
// 3. if it matches, print it

/**
 * @param $angle
 * @param $timeNow
 * @return string
 */
function clockHandAngle2($angle, $timeNow): string
{
    // starting values
    list($hours, $minutes, $seconds) = explode(":", $timeNow);

    // new values that we increment and search with
    $new_hours = 0;
    $new_minutes = 0;
    $new_seconds = 0;

    // add old values to the new values, we need a time after the given time
    $new_hours += $hours;
    $new_minutes += $minutes;
    $new_seconds += $seconds;

    while (true)
    {
        // different scenarios for angles
        $new_seconds += 1;

        // validations
        if ($new_seconds >= 60) {
            $new_minutes += 1;
            $new_seconds -= 60;
        }

        if ($new_minutes >= 60) {
            $new_hours += 1;
            $new_minutes -= 60;
        }

        if ($new_hours > 12) {
            $new_hours -= 12;
        }

        $new_angle = calcAngle($new_hours, $new_minutes, $new_seconds);

//        if ($new_angle == 180) {
//            $new_angle = 0;
//        }

        if ($new_angle == $angle) {
//            if ($new_minutes < 10) {
//                $new_minutes = "0" . $new_minutes;
//            }
//            if ($new_seconds < 10) {
//                $new_seconds = "0" . $new_seconds;
//            }
//            if ($new_hours < 10) {
//                $new_hours = "0" . $new_hours;
//            }

//            $match = "$new_hours:$new_minutes:$new_seconds";
            $match = "Angle found - $new_hours:$new_minutes:$new_seconds <br>
                        New Angle = $new_angle <br>
                        Old Angle = $angle";

            return $match;
        }
    }
}

// tests
function TestCHA()
{
    echo "1. ", calcAngle(12, 00, 00), "<br>-> Expected: 0<br><br>"; //
    echo "2. ", calcAngle(3, 00, 00), "<br>-> Expected: 90<br><br>"; //
    echo "3. ", calcAngle(6, 00, 00), "<br>-> Expected: 180<br><br>"; //
    echo "4. ", calcAngle(3, 45, 00), "<br>-> Expected: 157,5<br><br>"; //
    echo "5. ", calcAngle(4, 50, 00), "<br>-> Expected: 155<br><br>"; //
    echo "6. ", calcAngle(2, 05, 30), "<br>-> Expected: 29,75<br><br>"; //
    echo "7. ", calcAngle(12, 00, 01), "<br>-> Expected: 0.09166666666667425<br><br>";
    echo "8. ", calcAngle(8, 10, 12), "<br>-> Expected: 176,1<br><br>"; //
    echo "9. ", calcAngle(7, 46, 11), "<br>-> Expected: 44.008333333333326<br><br>"; //
    echo "10. ", calcAngle(1, 42, 01), "<br>-> Expected: 158.90833333333333<br><br>"; //
    echo "11. ", calcAngle(10, 33, 34), "<br>-> Expected: 115.38333333333332<br><br>"; //
    echo "12. ", calcAngle(6, 49, 55), "<br>-> Expected: 94.54166666666666<br><br>"; //
    echo "13. ", calcAngle(12, 44, 33), "<br>-> Expected: 114.97500000000002<br><br>"; //
}

function TestCHA2()
{
//    echo "1. ", clockHandAngle2(0, "12:00:00"), "<br><br>"; // "12:00:00" // gives 12:0:0
    echo "2. ", clockHandAngle2(0, "12:00:01"), " <br>-> Expected: 1:05:27<br><br>"; // gives 12:0:0
    echo "3. ", clockHandAngle2(30, "12:54:17"), "<br>-> Expected: 1:00:00<br><br>"; // gives  1:0:0
    echo "4. ", clockHandAngle2(90, "12:00:00"), "<br>-> Expected: 12:16:21<br><br>"; // gives 3:0:0
    echo "5. ", clockHandAngle2(57, "11:14:54"), "<br>-> Expected: 11:49:38<br><br>"; // gives 3:6:0
    echo "6. ", clockHandAngle2(5, "10:54:06"), "<br>-> Expected: 10:55:27<br><br>"; // gives 2:10:0
    echo "7. ", clockHandAngle2(180, "12:30:00"), "<br>-> Expected: 12:32:43<br><br>"; // gives 6:0:0
    echo "8. ", clockHandAngle2(129, "5:09:00"), "<br>-> Expected: 5:50:43<br><br>"; // gives 0:42:0
    echo "9. ", clockHandAngle2(11, "8:45:54"), "<br>-> Expected: 9:47:05<br><br>"; // gives  0:2:0
}

//TestCHA();
TestCHA2();
