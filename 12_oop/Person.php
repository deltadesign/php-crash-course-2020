<?php


class Person
{
    public string $f_name; // you can set data types on the properties
    public string $s_name;
    private ?int $age; // ? infront of type allows for null values

    public function __construct($f, $s, $a = NULL)
    {
        $this->f_name = $f;
        $this->s_name = $s;
        $this->age    = $a;
    }

    public function setAge($n)
    {
        $this->age = $n;
    }

    public function getAge()
    {
        return $this->age;
    }
}
