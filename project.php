<?php

function calcAngle($hours, $minutes) {
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

        if ($hours > 12)
            $hours = $hours - 12;
    }

    // Calculate the angles moved by hour and minute hands with reference to 12:00

    $hour_angle = 0.5 * ($hours * 60 + $minutes);
    $minute_angle = 6 * $minutes;

    // Find the difference between two angles
    $new_angle = abs($hour_angle - $minute_angle);

    // Return the smaller angle  of two possible angles
    $new_angle = min(360 - $new_angle, $new_angle);

    return $new_angle;
}

// 1. get input
// 2. increase time, check if angle matches
// 3. if it matches, print it

function clockHandAngle2($angle, $timeNow) {
    list($hours, $minutes, $seconds) = explode(":", $timeNow);

    $new_angle = 0;

    $new_hours = 0;
    $new_minutes = 0;
    $new_seconds = 0;

    $match = "";

//    $new_hours = $hours;
//    $new_minutes = $minutes;
//    $new_seconds = $seconds;

//    for ($i = 0; $i < 12; $i++) {
//        for ($j = 0; $j < 60; $j++) {
//            for ($k = 0; $k < 60; $k++) {

    while (true) {

        if ($new_seconds == 60) {
            $new_minutes++;
            $new_seconds -= 60;
        }

        if ($new_minutes == 60) {
            $new_hours++;
            $new_minutes -= 60;
        }

        $new_minutes++;

        $new_angle = calcAngle($new_hours, $new_minutes);

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

            $match = "Angle found! - $new_hours:$new_minutes:$new_seconds <br>
                        New Angle = $new_angle <br>
                        Old Angle = $angle";
            break;
            //  return "$new_hours:$new_minutes:$new_seconds";
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

echo "1. ", clockHandAngle2(0, "12:00:00"), "<br><br>"; // "12:00:00"
//echo "2. ", clockHandAngle2(0, "12:00:01"), "<br><br>"; // "1:05:27"
//echo "3. ", clockHandAngle2(30, "12:54:17"), "<br><br>"; // "1:00:00"
//echo "4. ", clockHandAngle2(90, "12:00:00"), "<br><br>"; // "12:16:21"
//echo "5. ", clockHandAngle2(57, "11:14:54"), "<br><br>"; // "11:49:38"
//echo "6. ", clockHandAngle2(5, "10:54:06"), "<br><br>"; // "10:55:27"
//echo "7. ", clockHandAngle2(180, "12:30:00"), "<br><br>"; // "12:32:43"
//echo "8. ", clockHandAngle2(129, "5:09:00"), "<br><br>"; // "5:50:43"
//echo "9. ", clockHandAngle2(11, "8:45:54"), "<br><br>"; // "9:47:05"
