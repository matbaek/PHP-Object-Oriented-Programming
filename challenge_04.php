<?php

class Bicycle {
    public static $instance_count = 0;

    public $brand;
    public $model;
    public $year;
    public $category;
    public $description = "This is a bicycle";
    private $weight_kg = 0.0;
    protected static $wheels = 2;

    public const CATEGORIES = ["Road", "Mountain", "Hybrid", "BMX"];

    public static function create() {
        $class_name = get_called_class();
        $obj = new $class_name;
        self::$instance_count++;
        return $obj;
    }

    public function name() {
        return "$this->brand $this->model ($this->year)";
    }

    public function wheel_details() {
        $wheel_string = static::$wheels == 1 ? "1 wheel" : static::$wheels . " wheels";
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
    protected static $wheels = 1;
}

$bicycle = new Bicycle;
$bicycle->brand = "Toyota";
$bicycle->model = "Aygo";
$bicycle->year = "2020";

echo "Bicycle: " . Bicycle::$instance_count . "<br />";
echo "Unicycle: " . Unicycle::$instance_count . "<br />";

$bike = Bicycle::create();
$uni = Unicycle::create();

echo "Bicycle: " . Bicycle::$instance_count . "<br />";
echo "Unicycle: " . Unicycle::$instance_count . "<br />";
echo "<hr />";

echo "Categories: " . implode(", ", Bicycle::CATEGORIES). "<br />";
$bicycle->category = Bicycle::CATEGORIES[0];
echo "Category: " . $bicycle->category . "<br />";


?>