<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $color;
    private $condition;
    private $image_path;

    function __construct($get_make_model, $car_price, $get_miles, $get_color, $get_condition = "Used", $get_image_path)
    {
        $this->make_model = $get_make_model;
        $this->price = $car_price;
        $this->miles = $get_miles;
        $this->color = $get_color;
        $this->condition = $get_condition;
        $this->image_path = $get_image_path;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getMakeModel()
    {
        return $this->make_model;
    }

    function getMiles()
    {
        return $this->miles;
    }

    function getColor()
    {
        return $this->color;
    }

    function getCondition()
    {
        return $this->condition;
    }

    function getImagePath()
    {
        return $this->image_path;
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7864, "Blue", "New", "img/porsche.jpg");
$ford = new Car("2011 Ford F450", 55995, 14241, "Maroon", NULL, "img/ford.jpg");
$lexus = new Car("2013 Lexus RX 350", 44700, 20000, "Silver", NULL, "img/lexus.jpg");
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "Green", NULL,"img/mercedes.jpg");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"]) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
        if ($cars_matching_search) {
            foreach ($cars_matching_search as $car) {
                $car_price = $car->getPrice();
                $get_make_model = $car->getMakeModel();
                $get_miles = $car->getMiles();
                $get_color = $car->getColor();
                $get_condition = $car->getCondition();
                $get_image_path = $car->getImagePath();

                  echo "<li> $get_make_model </li>";
                  echo "<ul>";
                      echo "<li> $$car_price </li>";
                      echo "<li> Miles: $get_miles </li>";
                      echo "<li> Condition: $get_condition </li>";
                      echo "<li> Color: $get_color </li>";
                      echo "<li><img src='$get_image_path'></li>";
                  echo "</ul>";
                }
              } else {
                  echo "<li> Sorry, no cars match </li>";
              }
        ?>
    </ul>
</body>
</html>
