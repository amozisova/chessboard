<?php

declare(strict_types=1);

class Pattern {
    private array $coordinates;

    public function __construct(array $coordinates) {
        $this->coordinates = $coordinates;
    }

    // Check if the pattern fits within the chessboard's boundaries
    public function fitsWithinBoard(int $boardSize): bool {
        foreach ($this->coordinates as $coordinate) {
            if ($coordinate->getX() < 1 || $coordinate->getX() > $boardSize || $coordinate->getY() < 1 || $coordinate->getY() > $boardSize) {
                return false;
            }
        }
        return true;
    }

    // Check if the pattern matches the tokens starting from a given token
    public function matches(array $tokens, Coordinate $startToken): bool {
        $xOffset = $startToken->getX() - $this->coordinates[0]->getX();
        $yOffset = $startToken->getY() - $this->coordinates[0]->getY();

        $tokenCoordinates = [];
        foreach ($tokens as $token) {
            $tokenCoordinates[$token->getX()][$token->getY()] = true;
        }

        foreach ($this->coordinates as $coordinate) {
            $x = $coordinate->getX() + $xOffset;
            $y = $coordinate->getY() + $yOffset;

            if (!isset($tokenCoordinates[$x][$y])) {
                return false;
            }
        }
        return true;
    }

    // Rotate the pattern 90 degrees clockwise
    public function rotate(): void {
        $rotated = [];
        foreach ($this->coordinates as $coordinate) {
            $rotated[] = CoordinateTransformer::rotateClockwise($coordinate);
        }
        $this->coordinates = $rotated;
    }

    // Flip the pattern horizontally
    public function flip(): void {
        $flipped = [];
        foreach ($this->coordinates as $coordinate) {
            $flipped[] = CoordinateTransformer::flipHorizontally($coordinate);
        }
        $this->coordinates = $flipped;
    }

    //Get pattern coordinates
    public function getCoordinates(): array
    {
        return $this->coordinates;
    }

}