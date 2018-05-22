# Mars Rovers Squad

## Execute:
`php index.php < stdin.txt`

## Overview
Purpose of this challenge is to enable you to demonstrate your proficiency in solving problems
using software engineering tools and processes. Read the specification below and produce a
solution.

The problem specified below requires a solution that receives input, does some processing and
then returns some output. You are free to implement any mechanism for feeding input into your
solution. You should provide sufficient evidence that your solution is complete by, as a
minimum, indicating that it works correctly against the supplied test data. Using a unit testing
framework would satisfy these requirements.

You will be scored based on the following criteria:
- Your ability to read and interpret the specification below.
- The architectural design of your solution.
- The readability of your code.
- Your overall approach to this exercise.

Notes:
- Database usage is not required.
- Usage of PHP version >= 5.3 is required.

## Specification
A squad of robotic rovers is to be landed by NASA on a plateau on Mars.
This plateau, which is curiously rectangular, must be navigated by the rovers so that their on
board cameras can get a complete view of the surrounding terrain to send back to Earth.

A rover's position is represented by a combination of an x and y co-ordinates and a letter
representing one of the four cardinal compass points. The plateau is divided up into a grid to
simplify navigation. An example position might be 0, 0, N, which means the rover is in the
bottom left corner and facing North.
In order to control a rover, NASA sends a simple string of letters. The possible letters are 'L', 'R'
and 'M'. 'L' and 'R' makes the rover spin 90 degrees left or right respectively, without moving
from its current spot.
'M' means move forward one grid point, and maintain the same heading.

Assume that the square directly North from (x, y) is (x, y+1).

### Input:
The first line of input is the upper-right coordinates of the plateau, the lower-left coordinates are
assumed to be 0,0.
The rest of the input is information pertaining to the rovers that have been deployed. Each rover
has two lines of input. The first line gives the rover's position, and the second line is a series of
instructions telling the rover how to explore the plateau.
The position is made up of two integers and a letter separated by spaces, corresponding to the
x and y co-ordinates and the rover's orientation.
Each rover will be finished sequentially, which means that the second rover won't start to move
until the first one has finished moving.

### Output:
The output for each rover should be its final co-ordinates and heading.

##  Example
*Test input:*  
5 5  
1 2 N  
LMLMLMLMM  
3 3 E  
MMRMMRMRRM  

*Test output:*  
1 3 N  
5 1 E  
