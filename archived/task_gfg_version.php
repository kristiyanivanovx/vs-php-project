<?php

// gfg - geeks for geeks

// PHP program to find angle between hour and minute hands

// Utility function to find minimum of two integers

//function mintwo($number_1, $number_2)
//{
//    if ($number_1 < $number_2) {
//        return $number_1;
//    } else {
//        return $number_2;
//    }
////    return ($number_1 < $number_2) ?
////        $number_1 : $number_2;
//}

/**
 * @param $hours
 * @param $minutes
 * @return string
 */
function calcAngle($hours, $minutes): string
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

        if ($hours > 12)
            $hours = $hours - 12;
    }

    // Calculate the angles moved by hour and minute hands with reference to 12:00
    $hour_angle = 0.5 * ($hours * 60 + $minutes);
    $minute_angle = 6 * $minutes;

    // Find the difference between two angles
    $angle = abs($hour_angle - $minute_angle);

    // Return the smaller angle  of two possible angles
    $angle = min(360 - $angle, $angle);

    return $angle;
}

echo "1. ", calcAngle(12, 00), "<br>";
echo "2. ", calcAngle(3, 00), "<br>";
echo "3. ", calcAngle(6, 00), "<br>";
echo "4. ", calcAngle(3, 45), "<br>";
echo "5. ", calcAngle(4, 50), "<br>";
echo "6. ", calcAngle(2, 05), "<br>";
echo "7. ", calcAngle(12, 00), "<br>";
echo "8. ", calcAngle(8, 10), "<br>";
echo "9. ", calcAngle(7, 46), "<br>";
echo "10. ", calcAngle(1, 42), "<br>";
echo "11. ", calcAngle(10, 33), "<br>";
echo "12. ", calcAngle(6, 49), "<br>";
echo "13. ", calcAngle(12, 44), "<br>";

echo "<br>tests from site: <br>";
echo "1. ", calcAngle(9, 60), "<br>";
echo "2. ", calcAngle(3, 30), "<br";
