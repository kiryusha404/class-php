<?php
class airport
{
    public $quantity = 0;

    public function take_the_plane(){
        $this->quantity -= 1;
    }
    public function plane_flew_away(){
        $this->quantity += 1;
    }
    public function plane_is_parked(){
        echo "plane is parked";
    }
    public function plane_is_ready_to_take_off($airport){
        echo "plane is ready to take off";
        $airport->take_the_plane();
    }
    public function boarding_is_not_available(){
        echo 'landing is not available due to weather conditions';
    }
    public function aircraft_creation(){
        $this->$quantity += 1;
    }
}

$airport = new aitport;

abstract class plane extends airport
{
    public $name_plane;
    public $max_speed;
    public $height = 0;

    abstract protected function takeoff($airport);
    abstract protected function landing($airport);
    abstract protected function set_name($name);
    abstract protected function set_max_speed($speed);
}

class MIG extends plane
{

    public function takeoff($airport) {
        $airport->plane_is_ready_to_take_off($airport);
        $this->height += 1;
    }
    public function landing($airport) {
        $airport->plane_flew_away();
        $this->height -= 1;
    }
    public function set_name($name) {
        $this->name_plane = $name;
    }
    public function set_max_speed($speed) {
        $this->max_speed = $speed;
    }
    public function attack() {
        echo 'FIRE!!!';
    }
}

class TY_154 extends plane
{

    public function takeoff($airport) {
        $airport->take_the_plane();
        $this->height += 1;
    }
    public function anding($airport) {
        $airport->plane_flew_away();
        $this->height -= 1;
    }
    public function set_name($name) {
        $this->name_plane = $name;
    }
    public function set_max_speed($speed) {
        $this->max_speed = $speed;
    }
}

$MIG1 = new MIG;
$MIG2 = new MIG;
$TY_154 = new TY_154;
?>