<?php

declare(strict_types=1);

class CoordinateTransformer {
    public static function rotateClockwise(Coordinate $coordinate): Coordinate {
        return new Coordinate($coordinate->getY(), -$coordinate->getX());
    }

    public static function flipHorizontally(Coordinate $coordinate): Coordinate {
        return new Coordinate($coordinate->getX(), -$coordinate->getY());
    }
}