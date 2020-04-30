<?php

class Bicycle {
    public $brand;
    public $model;
    public $year;
    public $description;
    private $weight_kg = 0.0;
    protected $wheels = 2;

    public function name() {
        return "$this->brand $this->model ($this->year)";
    }

    public function wheel_details() {
        $wheel_string = $this->wheels == 1 ? "1 wheel" : "{$this->wheels} wheels";
        return $wheel_string;
    }

    public function weight_kg() {
        return $this->weight_kg . " kg";
    }

    public function set_weight_kg($weight_kg) {
        $this->weight_kg = floatval($weight_kg);
    }

    public function weight_lbs() {
        $weight_lbs = floatval($this->weight_kg * 2.2);
        return $weight_lbs . " lbs";
    }

    public function set_weight_lbs($weight_lbs) {
        $this->weight_kg = floatval($weight_lbs / 2.2);
    }
}

class Unicycle extends Bicycle {
    protected $wheels = 1;
}

$bicycle = new Bicycle;
$bicycle->brand = "Toyota";
$bicycle->model = "Aygo";
$bicycle->year = "2020";
$bicycle->description = "This is a bicycle";

$unicycle = new Unicycle;

echo "Bicycle: " . $bicycle->wheel_details() . "<br />";
echo "Unicycle: " . $unicycle->wheel_details() . "<br />";
echo "<hr />";

echo "Set weight using kg <br />";
$bicycle->set_weight_kg(1);
echo $bicycle->weight_kg() . "<br />";
echo $bicycle->weight_lbs() . "<br />";
echo "<hr />";

echo "Set weight using lbs <br />";
$bicycle->set_weight_lbs(2);
echo $bicycle->weight_kg() . "<br />";
echo $bicycle->weight_lbs() . "<br />";
echo "<hr />";

echo "Set weight for unicycle <br />";
$unicycle->set_weight_kg(1);
echo $unicycle->weight_kg() . "<br />";
echo $unicycle->weight_lbs() . "<br />";
echo "<hr />";

?>