<?php

// Clock Hand Angle

// minute hand
// 60 minutes for 360 degrees
// 360/60 = 6 degrees
// 1 minute = 6 degrees (per minute)
// minute_angle = 6 * minutes; // for minute hand angle

// hour hand
// 12 hours for 360 degrees
// 360/(60*12) = 0.5 degrees (per minute)
// hour_angle = 0.5 * (60 * hours + minutes) // for hour hand angle

// minute hand covers 60 minutes, in the same time hour hand covers 5 minute distance
// minute hand covers 1 minutes, hour hand covers 5/60 minutes
// if minute hand covers 15 minute, the hour hand covers (5/60)*15 = 5/4 minute
// 5:15 = 10 minute + 5/4 minute
// 67.5 degrees

// <hour>:<minute>:<second>

// 1. read input

// 2. slice input

// 2.5 validation
//if (((int) $hours > 12 || (int) $hours < 0) ||
//    ($minutes > 60 || $minutes < 0) ||
//    ($seconds  > 60 || $seconds < 0)
//) {
//    print "Invalid input. - $hours:$minutes:$seconds";
//    return;
//}

// 3. cover basic cases
//if (($hours == '12' || $hours == '0') && $minutes == '00') {
//    print 0; return;
//} elseif (($hours == '3' || $hours == '9') && $minutes == '00' && $seconds == '00') {
//    print 90; return;
//} elseif ($hours == '6' && $minutes == '00' && $seconds == '00') {
//    print 180; return;
//}

// $subtotal_angle = 60 * $hours; // way 2

/**
 * @param $hours
 * @param $minutes
 * @return string
 */
function calcAngle($hours, $minutes): string
{
    // https://en.wikipedia.org/wiki/Clock_angle_problem
    $subtotal_angle = abs(0.5 * (60 * $hours - 11 * $minutes));

    if ($subtotal_angle > 180) {
        $subtotal_angle = 360 - $subtotal_angle;
    }

    return abs($subtotal_angle);
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
