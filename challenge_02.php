<?php

class Furniture {
    public $name;
    public $width;
    public $depth;
    public $height;
    public $price;
    public $is_sleeper = false;

    function area() {
        return floatval($this->width * $this->depth);
    }

    function volume() {
        return floatval($this->width * $this->height);
    }
}

class Drawer extends Furniture {
    public $drawers;

    function get_drawers() {
        return $this->drawers;
    }
}

class Bed extends Furniture {
    public $is_sleeper = true;
}

function inspect_class($class_name) {
    $output = "";

    $output .= $class_name;
    $parant_class = get_parent_class($class_name);
    if($parant_class != "") {
        $output .= " extends $parant_class";
    }
    $output .= "\n";

    $class_vars = get_class_vars($class_name);
    ksort($class_vars);
    $output .= "properties: \n";
    foreach($class_vars as $k => $v) {
        $output .= "- $k: $v\n";
    }

    $class_methods = get_class_methods($class_name);
    sort($class_methods);
    $output .= "methods: \n";
    foreach($class_methods as $k) {
        $output .= "- $k\n";
    }

    return $output;
}

$class_names = ["Furniture", "Drawer", "Bed"];
foreach($class_names as $class_name) {
    echo nl2br(inspect_class($class_name));
    echo "<br />";
}

$drawer = new Drawer;
$drawer->name = "Nice drawer";
$drawer->width = 4;
$drawer->depth = 2;
$drawer->height = 3;
$drawer->price = 100;
$drawer->drawers = 2;

echo "{$drawer->area()} <br />";
echo "{$drawer->volume()} <br />";
echo "{$drawer->get_drawers()} <br />";

$bed = new Bed;
$bed->name = "Nice drawer";
$bed->width = 4;
$bed->depth = 2;
$bed->height = 3;
$bed->price = 100;

echo "{$bed->area()} <br />";
echo "{$bed->volume()} <br />";

?>