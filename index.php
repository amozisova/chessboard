<?php

require_once 'Chessboard.php';
require_once 'Coordinate.php';
require_once 'CoordinateTransformer.php';
require_once 'Pattern.php';


// Test data
$tokens = [
    new Coordinate(3, 1),
    new Coordinate(2, 2),
    new Coordinate(4, 2),
    new Coordinate(3, 3),
    new Coordinate(2, 4)
];

$patterns = [
    new Pattern([new Coordinate(1, 1)]),
    new Pattern([new Coordinate(1, 1), new Coordinate(2, 2)]),
    new Pattern([new Coordinate(1, 1), new Coordinate(2, 2), new Coordinate(3, 3)]),
    new Pattern([new Coordinate(1, 2), new Coordinate(2, 1), new Coordinate(3, 2)]),
    new Pattern([new Coordinate(1, 1), new Coordinate(2, 1)]),
    new Pattern([new Coordinate(1, 1), new Coordinate(1, 4)]),
    new Pattern([new Coordinate(1, 1), new Coordinate(2, 4)])
];


try {
    $chessboard = new Chessboard(20, $tokens);

    foreach ($patterns as $pattern) {
        // Echo the coordinates of the tested pattern
        echo "Obrazec: ";
        foreach ($pattern->getCoordinates() as $coordinate) {
            echo $coordinate->getX() . "," . $coordinate->getY() . " ";
        }
        echo "<br>";

        // Check if the pattern exists on the chessboard
        $result = $chessboard->containsPattern($pattern) ? "ANO" : "NE";
        echo "Je obsažen v žetonech na šachovnici: $result\n";
        echo "<br>";
    }

} catch (InvalidArgumentException $e) {
    echo "Chyba: " . $e->getMessage();
}