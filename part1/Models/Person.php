<?php
namespace part1\Models;

    class Person{
        public  $name, $age;

        public function __construct($name, $age)
        {
            $this->name = $name;
            $this->age = $age;
        }
    }