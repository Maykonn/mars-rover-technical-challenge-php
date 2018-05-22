<?php

namespace MarsRover\Test\Model\Direction;


use MarsRover\Model\Direction\Direction;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    public function testThrowsExceptionWhenInvalidOrientationGiven()
    {
        $this->expectException(\Exception::class);
        new Direction("SW"); // SW not imp
    }
}
