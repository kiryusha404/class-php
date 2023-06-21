<?php

class Airport{ // Класс аэропорта

    public $number_of_aircraft = 0; // количество самолётов в аэрпорту


    public function  plane_is_ready(Airport $airport){ //  Функция сообщающая что самолёт готов взлетать
        echo 'The plane is ready to take off';
        echo '</br>';
        $airport->plane_flew_away();
    }
    public function  plane_flew_away(){ //  Функция сообщающая что самолёт освободил место и улетел
        $this->number_of_aircraft -=1;
        echo 'The plane flew away';
        echo '</br>';
    }
    public function take_plane(Airport $airport){ //  Функция принятия самолёта
        echo 'The plane is accepted';
        echo '</br>';
        $airport->airplane_in_parking_lot();
    }
    public function  airplane_in_parking_lot(){ //  Функция сообщающая что самолёт на стоянку
        $this->number_of_aircraft +=1;
        echo 'The plane went to the parking lot';
        echo '</br>';
    }
    public function  add_plane(){ //  Функция сообщающая что самолёт создан и добавлен на стоянку аэропорта
        $this->number_of_aircraft += 1;
    }
    public function  get_status(){ //  Функция сообщающая сколько самолётов в аэрпорту
        echo "Planes at the airport: ";
        echo $this->number_of_aircraft;
        echo '</br>';
    }



}

abstract class Plane{ //абстракный класс самолёт

    public $name_plane;
    public $max_speed;
    public $height = 0;

    public function __construct($name, $speed, Airport $airport){ //Конструктор
        $this->name_plane = $name;
        $this->max_speed = $speed;
        $airport->add_plane();
    }

    abstract protected function takeoff(Airport $airport);
    abstract protected function landing(Airport $airport);
    abstract protected function get_status();
}

class MIG extends Plane //класс определённого типа самолёта
{

    public function __construct($name, $speed, Airport $airport){
        parent::__construct($name, $speed, $airport);
    }
    public function attack(){ //Фунция стрельбы самолета
        echo $this->name_plane.': FIRE!!!';
        echo '</br>';
    }

    public function takeoff(Airport $airport){ //Функция взлёта с проверкой летит ли самолёт
        if($this->height == 0){
            $airport->plane_is_ready($airport);
        }
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
    public function landing(Airport $airport){ //Функция посадки с проверкой летит ли самолёт
        if($this->height == 1){
            $airport->take_plane($airport);
        }
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

class TY_154 extends Plane //класс определённого типа самолёта
{
    public function __construct($name, $speed, Airport $airport){
        parent::__construct($name, $speed, $airport);
    }

    public function takeoff(Airport $airport){ //Функция взлёта с проверкой летит ли самолёт
        if($this->height == 0){
            $airport->plane_is_ready($airport);
        }
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
    public function landing(Airport $airport){ //Функция посадки с проверкой летит ли самолёт
        if($this->height == 1){
            $airport->take_plane($airport);
        }
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

$airport = new Airport;

$TY_154 = new TY_154('corn', 250, $airport);//Обьект класса ТУ
$MIG2 = new MIG('blood', 330, $airport); // обьект класса МИГ
$MIG1 = new MIG('bullet', 300, $airport); // обьект класса МИГ
$MIG1->takeoff($airport);
$MIG1->takeoff($airport);
$MIG1->attack();
$MIG1->landing($airport);
$MIG1->get_status();


$airport->get_status();
?>
