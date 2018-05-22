<?php

namespace MarsRover\Model\Direction;

class Direction
{
    const NORTH = "N";
    const WEST = "W";
    const EAST = "E";
    const SOUTH = "S";

    private $orientation = "";

    public function getOrientation(): string
    {
        return $this->orientation;
    }

    public function __construct(string $orientation)
    {
        $orientation = trim($orientation);
        if ($this->isValid($orientation)) {
            $this->orientation = $orientation;
            return;
        }
        throw new \Exception("Invalid Orientation, given: " . $orientation);
    }

    private function isValid($orientation): bool
    {
        return in_array(
            $orientation,
            [
                self::NORTH,
                self::WEST,
                self::EAST,
                self::SOUTH
            ]
        );
    }
}
