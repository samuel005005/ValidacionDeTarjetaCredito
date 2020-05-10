<?php
//$CardNumber = 4220943143799218;
$CardNumber = $_GET['CardNumber'] ?? null;
if (!is_numeric($CardNumber)) {
    echo("INVALID\n");
    return;
}
$digit1 = 0;
$digit2 = 0;
$num_digits = 0;
$sum_of_double_odds = 0;
$sum_of_evens = 0;

while ($CardNumber > 0) {
    $digit2 = $digit1;
    $digit1 = intval($CardNumber % 10);
    if ($num_digits % 2 == 0) {
        $sum_of_evens += $digit1;
    } else {
        $multiple = 2 * $digit1;
        $sum_of_double_odds += intval(($multiple / 10)) + intval(($multiple % 10));
    }

    $CardNumber = intval($CardNumber / 10);
    $num_digits++;
}

$is_valid = ($sum_of_evens + $sum_of_double_odds) % 10 == 0;

$first_two_digits = ($digit1 * 10) + $digit2;

if ($is_valid) {
    if ($digit1 == 4 && $num_digits >= 13 && $num_digits <= 16) {
        echo("VISA\n");
    } else if ($first_two_digits >= 51 && $first_two_digits <= 55 && $num_digits == 16) {
        echo(" MASTERCARD\n");
    } else if (($first_two_digits == 34 || $first_two_digits == 37) && $num_digits == 15) {
        echo("AMERICA EXPRESS\n");
    } else {
        echo("VALIDA PERO TIPO DESCONOCIDO\n");
    }
} else {
    echo("INVALID\n");
}
