<?php

require_once "Person.php"; //require once is the correct syntax - as student also has person within it
require_once "Student.php";


// What is class and instance
// Create Car class
class Car
{
    //properties : these are the variables of the object - only in classes we call them properties!
    // public    : the property / method can be accessed anywhere - this is the default.
    // protected : the property can only be accessed within the class and by classes derived from that class.
    // private   : the property can only be accessed within the class.
    public $make;
    public $model;
    public $color;
    private $registration;

    //static properties and methods belong to the class and NOT the instances/objects thereof
    public static $counter = 0;

    //methods : these are the functions inside the object - only in classes we call them methods!
    public function __construct($make, $model, $color, $reg)
    {
        $this->make = $make;
        $this->model = $model;
        $this->color = $color;
        $this->registration = $reg;

        self::$counter++; // access / update static properties using the keyword of self::$property
    }

    public function myCar()
    {
        echo "My car is a $this->color $this->make." . "</br>";
    }

    public function setReg($newReg) // SETTER this sets the property inside the object to a new value
    {
        $this->registration = $newReg;
    }

    public function getReg() // GETTER this gets the value of a property (REQUIRED FOR PRIVATE PROPERTIES)
    {
        echo $this->registration . "</br>";
    }

    public static function getCount()
    {
        echo self::$counter . '</br>';
    }

    public function __destruct() // the __destruct function runs everytime you create an instance
    {
        echo "Instance of Car created successfully, enjoy your {$this->make} {$this->model}." . "</br>";
    }
}

// Create instance of Car

$car1 = new Car("Volvo", "V40", "Black", "YM60GYV"); // USING A CONSTRUCTOR
$car2 = new Car("Ford", "Mustang", "Red", "RG19KMP"); // USING A CONSTRUCTOR

// WITHOUT CONSTRUCTOR FUNCTION
// $car1->make  = "Volvo";
// $car1->model = "V40";
// $car1->color = "black";

echo '<pre>';
var_dump($car1);
echo '<pre>';

echo '<pre>';
var_dump($car2);
echo '<pre>';

// Using setter and getter
echo $car1->setReg('YN61GRT');
echo $car1->getReg();
echo Car::getCount(); //gets the count from the Class use double colon to access Class properties


$p = new Person("Bob", "Terwilliger", "42");

echo '<pre>';
var_dump($p);
echo '<pre>';

$s = new Student("Dan", "Thomas", 40, 51969);

echo '<pre>';
var_dump($s);
echo '<pre>';
