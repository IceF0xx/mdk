<?php

require_once __DIR__ . "/vendor/autoload.php";

use mihajlov\QuadraticEquation;
use mihajlov\MyLog as ml;
use mihajlov\MihajlovException;

ini_set("display_errors", 1);
error_reporting(-1);

try {
    ml::log("Programm ver. " . trim(file_get_contents("version")));
    echo "Enter value: A, B, C\n\r";

    $a = floatval(readline());
    $b = floatval(readline());
    $c = floatval(readline());

    $eq = new QuadraticEquation();

    $solutions = $eq->solve($a, $b, $c);
    if ($a === 0.) {
        ml::log("Linear equation");
        ml::log("{$b}x " . ($c > 0 ? "+ " : "- ") . "{$c} = 0");
    } else {
        ml::log("Quadratic equation");
        ml::log("{$a}x^2 " . ($b > 0 ? "+ " : "- ") . "{$b}x " . ($c > 0 ? "+ " : "- ") . "{$c} = 0");

    }

    $result = "Equation roots: " . implode(' ', $solutions);
    ml::log($result);
} catch (MihajlovException $me) {
    ml::log($me->get_message());
}

ml::write();

?>