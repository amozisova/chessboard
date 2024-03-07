# Chessboard Pattern Matching #
**This PHP program aims to determine whether a specified pattern exists on a chessboard, regardless of rotations or flips of the pattern.** 

The program utilizes several classes:

- **Chessboard**: Represents the chessboard and provides a method to check if a pattern exists on it.
- **Pattern**: Defines a pattern to search for on the chessboard and includes methods for rotation and flipping.
- **Coordinate**: Represents a coordinate on the chessboard.
- **CoordinateTransformer**: Provides methods to rotate and flip coordinates.

## Usage ##
The index.php file contains test data for tokens and patterns. The program initializes a chessboard with the specified tokens and iterates over the provided patterns to check if each pattern exists on the chessboard. It then outputs the results.

## Testing ##
To test the program, modify the test data in index.php with your desired tokens and patterns. Then run index.php to see if the specified patterns exist on the chessboard.

### Note ###
Ensure that all required files (Chessboard.php, Pattern.php, Coordinate.php, CoordinateTransformer.php) are included in the same directory as index.php for proper functioning.
