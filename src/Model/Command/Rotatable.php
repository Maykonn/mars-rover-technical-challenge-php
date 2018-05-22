<?php

namespace MarsRover\Model\Command;

abstract class Rotatable
{
    abstract protected function rotateFrom($currentDirection): string;
}