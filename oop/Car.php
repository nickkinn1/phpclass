<?php

namespace oop;

class Car
{
    public $make;
    public $model;
    public $year;
    public $color;

    public $status;

    public function __construct(){
        //echo "new car created!";
        $this->park();
    }

    public function print()
    {
        echo "This car is $this->color, and is $this->status";
    }

    public function forward()
    {
        $this->status = "moving forward";
    }

    public function park()
    {
        $this->status = "parked";
    }
}

$ryansCar = new Car();
$ryansCar->color = "black";
$ryansCar->forward();

$nicksCar = new car();
$nicksCar->color = "white";
$nicksCar -> park();

$michaelsCar = new Car();
$michaelsCar->color = "blue";

$ryansCar->print();
$nicksCar->print();
$michaelsCar->print();