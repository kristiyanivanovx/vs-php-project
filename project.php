<?php

// my version
function calcAngleKV($hours, $minutes)
{
    $subtotal_angle = abs(0.5 * (60 * $hours - 11 * $minutes));

    if ($subtotal_angle > 180) {
        $subtotal_angle = 360 - $subtotal_angle;
    }

    return abs($subtotal_angle);
}

// geeks for geeks, modified
function calcAngle($hours, $minutes, $seconds)
{
    // validate the input
    if ($hours < 0 || $minutes < 0 ||
        $hours > 12 || $minutes > 60) {
        echo "Wrong input";
    }

    if ($hours == 12) {
        $hours = 0;
    }

    if ($minutes == 60) {
        $minutes = 0;
        $hours += 1;

        if ($hours > 12) {
            $hours = $hours - 12;
        }
    }

    // Calculate the angles moved by hour and minute hands with reference to 12:00
    // $hour_angle = 0.5 * ($hours * 60 + $minutes);
    // $minute_angle = 6 * $minutes;

    $minute_angle = 6 * $minutes + (6 * $seconds / 60);
    $hour_angle = 30 * $hours + (30 * ($minutes + $seconds / 60) / 60);

    // Find the difference between two angles
    $new_angle = abs($hour_angle - $minute_angle);

    // Return the smaller angle  of two possible angles
    $new_angle = min(360 - $new_angle, $new_angle);

    return $new_angle;
}

// 1. get input
// 2. increase time, check if angle matches
// 3. if it matches, print it

function clockHandAngle2($angle, $timeNow)
{
    list($hours, $minutes, $seconds) = explode(":", $timeNow);

    $new_angle = 0;

    $new_hours = 0;
    $new_minutes = 0;
    $new_seconds = 0;

    $new_hours += (float) $hours;
    $new_minutes += (float) $minutes;
    $new_seconds += (float) $seconds;

//    for ($i = 0; $i < 12; $i++) {
//        for ($j = 0; $j < 60; $j++) {
//            for ($k = 0; $k < 60; $k++) {

    while (true) {
        $new_angle += 1;

        if ($new_seconds == 60) {
            $new_minutes += 1;
            $new_seconds = 0;
        }

        if ($new_minutes == 60) {
            $new_hours += 1;;
            $new_minutes = 0;
        }
        if ($new_hours > 12)
        {
            $new_hours -= 12;
        }

//        if ($new_angle == 180) {
//            $new_angle = 0;
//        }

        $new_minutes += 0.125; // 1, 0.5, 0.25, 0.125

//        $new_angle = calcAngle($new_hours, $new_minutes);
        $new_angle = calcAngle($new_hours, $new_minutes, $new_seconds);

        if ($new_minutes == 60) {
            $new_hours += 1;;
            $new_minutes -= 60;
        }

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

            $match = "Angle found - $new_hours:$new_minutes:$new_seconds <br>
                        New Angle = $new_angle <br>
                        Old Angle = $angle";
            break;
        }

//        $new_seconds++;
//        $new_minutes++;
    }

    return $match;

//            }
//        }
//    }

}

// tests
function TestCHA()
{
    echo "1. ", calcAngle(12, 00, 00), "<br>-> Expected: 0<br><br>"; //   // gives 12:0:0
    echo "2. ", calcAngle(3, 00, 00), "<br>-> Expected: 90<br><br>"; //  // gives 12:0:0
    echo "3. ", calcAngle(6, 00, 00), "<br>-> Expected: 180<br><br>"; //  // gives  1:0:0
    echo "4. ", calcAngle(3, 45, 00), "<br>-> Expected: 157,5<br><br>"; // // gives 3:0:0
    echo "5. ", calcAngle(4, 50, 00), "<br>-> Expected: 155<br><br>"; // // gives 3:6:0
    echo "6. ", calcAngle(2, 05, 30), "<br>-> Expected: 29,75<br><br>"; // // gives 2:10:0
    echo "7. ", calcAngle(12, 00, 01), "<br>-> Expected: 0.09166666666667425<br><br>"; //  // gives 6:0:0
    echo "8. ", calcAngle(8, 10, 12), "<br>-> Expected: 176,1<br><br>"; //   // gives 0:42:0
    echo "9. ", calcAngle(7, 46, 11), "<br>-> Expected: 44.008333333333326<br><br>"; //  // gives  0:2:0
    echo "10. ", calcAngle(1, 42, 01), "<br>-> Expected: 158.90833333333333<br><br>"; //  // gives  0:2:0
    echo "11. ", calcAngle(10, 33, 34), "<br>-> Expected: 115.38333333333332<br><br>"; //  // gives  0:2:0
    echo "12. ", calcAngle(6, 49, 55), "<br>-> Expected: 94.54166666666666<br><br>"; //  // gives  0:2:0
    echo "13. ", calcAngle(12, 44, 33), "<br>-> Expected: 114.97500000000002<br><br>"; //  // gives  0:2:0
}

function TestCHA2()
{
    echo "1. ", clockHandAngle2(0, "12:00:00"), "<br><br>"; // "12:00:00" // gives 12:0:0
    echo "2. ", clockHandAngle2(0, "12:00:01"), "<br><br>"; // "1:05:27" // gives 12:0:0
    echo "3. ", clockHandAngle2(30, "12:54:17"), "<br><br>"; // "1:00:00" // gives  1:0:0
    echo "4. ", clockHandAngle2(90, "12:00:00"), "<br><br>"; // "12:16:21" // gives 3:0:0
    echo "5. ", clockHandAngle2(57, "11:14:54"), "<br><br>"; // "11:49:38" // gives 3:6:0
    echo "6. ", clockHandAngle2(5, "10:54:06"), "<br><br>"; // "10:55:27" // gives 2:10:0
    echo "7. ", clockHandAngle2(180, "12:30:00"), "<br><br>"; // "12:32:43" // gives 6:0:0
    echo "8. ", clockHandAngle2(129, "5:09:00"), "<br><br>"; // "5:50:43" // gives 0:42:0
    echo "9. ", clockHandAngle2(11, "8:45:54"), "<br><br>"; // "9:47:05" // gives  0:2:0
}

TestCHA();
//TestCHA2();
