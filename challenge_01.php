<?php

class Bicycle {
    public $brand;
    public $model;
    public $year;
    public $description;
    public $weight_kg = 0.0;

    function name() {
        return "$this->brand $this->model ($this->year)";
    }

    function weight_lbs() {
        $weight_lbs = floatval($this->weight_kg * 2.2);
        return $weight_lbs;
    }

    function set_weight_lbs($weight_lbs) {
        $this->weight_kg = floatval($weight_lbs / 2.2);
    }
}


$new_bicycle = new Bicycle;
$new_bicycle->brand = "Toyota";
$new_bicycle->model = "Aygo";
$new_bicycle->year = "2020";
$new_bicycle->description = "This is a bicycle";
$new_bicycle->weight_kg = "30";

echo "{$new_bicycle->name()} <br />";
echo "{$new_bicycle->weight_lbs()} <br />";
$new_bicycle->set_weight_lbs(220);
echo "{$new_bicycle->weight_lbs()} <br />";;

echo "{$new_bicycle->weight_kg} <br />";;

?>