<?php

abstract class Plane{

    public $name_plane;
    public $max_speed;
    public $height = 0;

    public function __construct($name, $speed){ //Конструктор
        $this->name_plane = $name;
        $this->max_speed = $speed;
    }

    abstract protected function takeoff();
    abstract protected function landing();
    abstract protected function get_status();
}

class MIG extends Plane
{

    public function __construct($name, $speed){
        parent::__construct($name, $speed);
    }
    public function attack(){ //Фунция стрель самолета
        echo $this->name_plane.': FIRE!!!';
        echo '</br>';
    }

    public function takeoff(){ //Функция взлёта с проверкой летит ли самолёт
        echo $this->name_plane;
        if($this->height == 0){
            $this->height += 1;
            echo ': the plane took off';
            echo '</br>';
        }
        else{
            echo ': the plane is already flying';
            echo '</br>';
        }
    }
    public function landing(){ //Функция посадки с проверкой летит ли самолёт
        echo $this->name_plane;
        if($this->height == 1){
            $this->height -= 1;
            echo ': the plane landed';
            echo '</br>';
        }
        else{
            echo ': the plane is already on the ground';
            echo '</br>';
        }
    }
    public function get_status(){ // Фунция узнаёт статус самолёта
        echo $this->name_plane;
        if($this->height == 0){
            echo ': the plane is on the ground';
            echo '</br>';
        }
        else{
            echo ': the plane is flying';
            echo '</br>';
        }
    }
}

class TY_154 extends Plane
{
    public function __construct($name, $speed){
        parent::__construct($name, $speed);
    }

    public function takeoff(){ //Функция взлёта с проверкой летит ли самолёт
        echo $this->name_plane;
        if($this->height == 0){
            $this->height += 1;
            echo ': the plane took off';
            echo '</br>';
        }
        else{
            echo ': the plane is already flying';
            echo '</br>';
        }
    }
    public function landing(){ //Функция посадки с проверкой летит ли самолёт
        echo $this->name_plane;
        if($this->height == 1){
            $this->height -= 1;
            echo ': the plane landed';
            echo '</br>';
        }
        else{
            echo ': the plane is already on the ground';
            echo '</br>';
        }
    }
    public function get_status(){ // Фунция узнаёт статус самолёта
        echo $this->name_plane;
        if($this->height == 0){
            echo ': the plane is on the ground';
            echo '</br>';
        }
        else{
            echo ': the plane is flying';
            echo '</br>';
        }
    }
}

$MIG1 = new MIG('bullet', 300);
$MIG1->takeoff();
$MIG1->takeoff();
$MIG1->attack();
$MIG1->landing();
$MIG1->get_status();
?>
