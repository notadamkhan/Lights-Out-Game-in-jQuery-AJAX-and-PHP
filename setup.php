<?php
$rows = $_GET['rows'];
$cols = $_GET['cols'];

$numBoxes = $rows * $cols;
$startingPositions = [];

if ($numBoxes < 10) { // all lit up
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $startingPositions[] = $i . '-' . $j;
        }
    }
} else {
    while (count($startingPositions) < 10) {
        $row = rand(0, $rows - 1);
        $col = rand(0, $cols - 1);
        $position = $row . '-' . $col;
        if (!in_array($position, $startingPositions)) {
            $startingPositions[] = $position;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($startingPositions);