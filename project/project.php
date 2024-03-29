<?php

/**
 * @param $hours
 * @param $minutes
 * @param $seconds
 * @return string
 */
function calculateAngle($hours, $minutes, $seconds): string
{
	// calculate the angles for the hour and minute hands with reference to 12:00
	$hour_hand_angle = 0.5 * (60 * $hours + ($minutes + $seconds / 60));
	$minute_hand_angle = 6 * ($minutes + $seconds / 60);

	// find the angle between the two hands
	$angle = abs($hour_hand_angle - $minute_hand_angle);

	if ($angle > 180) {
		$angle = 360 - $angle;
	}

	return $angle;
}

// 1. get input and validate it (if + regex)
// 2. increase time, check if angle /almost/ matches
// 3. if it matches, return the result and print it
// 4. else, go to 2

/**
 * @param $angle
 * @param $timeNow
 * @return string
 */
function clockHandAngle2($angle, $timeNow): string
{
	// if input (timeNow) is in valid format, return 1 or else, return 0
	$pattern = '/^[0-1]?[0-9]:[0-5][0-9]:[0-5][0-9]$/';
	$valid = preg_match($pattern, $timeNow);

	// validate that angle is numeric and not out of bounds
	if ($angle > 180 || $angle < 0 || !is_numeric($angle) || !$valid) {
		$_SESSION['result'] = "Невалидни данни.";
		return $_SESSION['result'];
	}

	list($hours, $minutes, $seconds) = explode(":", $timeNow);

	while (true) {
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

		// 0.10 no good - test 2, 3; 0.07 no good - test 4; 0.08, 0.09 - works fine
		$margin_of_error = 0.085;
		$new_angle = calculateAngle($hours, $minutes, $seconds);

		// if the absolute value of the angles' differences is negligibly small (< 0.09)
		if (abs($new_angle - $angle) < $margin_of_error) {
			if ((strlen($minutes)) < 2) {
				$minutes = "0" . $minutes;
			}

			if ((strlen($seconds)) < 2) {
				$seconds = "0" . $seconds;
			}

			return "$hours:$minutes:$seconds";
		}

		$seconds += 1;
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
	echo "<div class=\"container-fluid\">";
	echo "Begin tests for clock hand angle.<br><br>";
	echo "1. ", calculateAngle(12, 00, 00), "<br>-> Expected: 0<br><br>";
	echo "2. ", calculateAngle(3, 00, 00), "<br>-> Expected: 90<br><br>";
	echo "3. ", calculateAngle(6, 00, 00), "<br>-> Expected: 180<br><br>";
	echo "4. ", calculateAngle(3, 45, 00), "<br>-> Expected: 157,5<br><br>";
	echo "5. ", calculateAngle(4, 50, 00), "<br>-> Expected: 155<br><br>";
	echo "6. ", calculateAngle(2, 05, 30), "<br>-> Expected: 29,75<br><br>";
	echo "7. ", calculateAngle(12, 00, 01), "<br>-> Expected: 0.09166666666667425<br><br>";
	echo "8. ", calculateAngle(8, 10, 12), "<br>-> Expected: 176,1<br><br>";
	echo "9. ", calculateAngle(7, 46, 11), "<br>-> Expected: 44.008333333333326<br><br>";
	echo "10. ", calculateAngle(1, 42, 01), "<br>-> Expected: 158.90833333333333<br><br>";
	echo "11. ", calculateAngle(10, 33, 34), "<br>-> Expected: 115.38333333333332<br><br>";
	echo "12. ", calculateAngle(6, 49, 55), "<br>-> Expected: 94.54166666666666<br><br>";
	echo "13. ", calculateAngle(12, 44, 33), "<br>-> Expected: 114.97500000000002<br><br>";
	echo "Tests for clock hand angle end.<br><br>";
	echo "</div>";
}

function TestCHA2()
{
	echo "<div class=\"container-fluid\">";
	echo "Begin tests for clock hand angle 2.<br><br>";
	echo "1. ", clockHandAngle2(0, "12:00:00"), "<br>-> Expected: 12:00:00<br><br>";
	echo "2. ", clockHandAngle2(0, "12:00:01"), "<br>-> Expected: 1:05:27<br><br>";
	echo "3. ", clockHandAngle2(30, "12:54:17"), "<br>-> Expected: 1:00:00<br><br>";
	echo "4. ", clockHandAngle2(90, "12:00:00"), "<br>-> Expected: 12:16:21<br><br>";
	echo "5. ", clockHandAngle2(57, "11:14:54"), "<br>-> Expected: 11:49:38<br><br>";
	echo "6. ", clockHandAngle2(5, "10:54:06"), "<br>-> Expected: 10:55:27<br><br>";
	echo "7. ", clockHandAngle2(180, "12:30:00"), "<br>-> Expected: 12:32:43<br><br>";
	echo "8. ", clockHandAngle2(129, "5:09:00"), "<br>-> Expected: 5:50:43<br><br>";
	echo "9. ", clockHandAngle2(11, "8:45:54"), "<br>-> Expected: 9:47:05<br><br>";
	echo "Tests for clock hand angle 2 end.<br><br>";
	echo "</div>";
}

//TestCHA();
//TestCHA2();
