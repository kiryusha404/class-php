<?php

abstract class Plane{

    public $name_plane;
    public $max_speed;
    public $height = 0;

    public function __construct($name, $speed){
        $this->name_plane = $name;
        $this->max_speed = $speed;
    }

    abstract protected function takeoff();
    abstract protected function landing();
}

class MIG extends Plane
{

    public function __construct($name, $speed){
        parent::__construct($name, $speed);
    }
    public function attack(){
        echo "FIRE!!!";
    }
}

class TY_154 extends Plane
{
    public function __construct($name, $speed){
        parent::__construct($name, $speed);
    }
}

$MIG1 = new MIG('bullet', 300);
$MIG1->attack();

?>
