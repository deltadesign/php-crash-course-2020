<?php

// Student will be a child class of Person.php
// it will inherit all of the properties from it's parent 


require_once "Person.php";

class Student extends Person
{
    public function __construct($f, $s, $a, $student_id)
    {
        $this->student_id = $student_id;
        parent::__construct($f, $s, $a);
    }
}
