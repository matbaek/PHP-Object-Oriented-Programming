<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicycle</title>
</head>
<body>
<?php require_once('../private/initialize.php'); ?>

<table border="1">
    <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Color</th>
        <th>Weight</th>
        <th>Condition</th>
        <th>Price</th>
    </tr>

<?php

$parser = new ParseCSV(PRIVATE_PATH . "/used_bicycles.csv");
$bike_array = $parser->parse();

foreach($bike_array as $args) {
    $bike = new Bicycle($args);
    echo "<tr>";
    echo "<td>" . h($bike->brand) . "</td>";
    echo "<td>" . h($bike->model) . "</td>";
    echo "<td>" . h($bike->year) . "</td>";
    echo "<td>" . h($bike->category) . "</td>";
    echo "<td>" . h($bike->gender) . "</td>";
    echo "<td>" . h($bike->color) . "</td>";
    echo "<td>" . h($bike->weight_kg()) . " / " . h($bike->weight_lbs()) . "</td>";
    echo "<td>" . h($bike->condition()) . "</td>";
    echo "<td>" . h("$" . number_format($bike->price, 2)) . "</td>";
    echo "</tr>";
}

?> 
</table>

</body>
</html>