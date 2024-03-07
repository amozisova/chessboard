<?php

declare(strict_types=1);

class Chessboard {
    private int $boardSize;
    private array $tokens;

    public function __construct(int $boardSize, array $tokens) {
        $this->validateInputs($boardSize, $tokens);
        $this->boardSize = $boardSize;
        $this->tokens = $tokens;
    }

    // Validate inputs
    private function validateInputs(int $boardSize, array $tokens): void {
        if ($boardSize <= 0) {
            throw new InvalidArgumentException("Rozměr šachovnice musí být větší než 0.");
        }
        if (empty($tokens)) {
            throw new InvalidArgumentException("Pole žetonů nesmí být prázdné.");
        }
    }

    // Check if the chessboard contains the specified pattern
    public function containsPattern(Pattern $pattern): bool {
        if (!$pattern->fitsWithinBoard($this->boardSize)) {
            return false; // Pattern exceeds the chessboard size
        }
        foreach ($this->tokens as $token) {
            for ($rotation = 0; $rotation < 4; $rotation++) {
                for ($flip = 0; $flip < 2; $flip++) {
                    if ($pattern->matches($this->tokens, $token)) {
                        return true;
                    }
                    $pattern->rotate();
                }
                $pattern->flip();
            }
        }
        return false;
    }
}