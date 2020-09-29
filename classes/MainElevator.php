<?php

namespace classes;


abstract class MainElevator
{
    abstract public function start();

    abstract public function logic();

    abstract public function floor();
}