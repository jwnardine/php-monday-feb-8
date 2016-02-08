<?php
class Parcel
{
    private $weight;
    private $length;
    private $width;
    private $height;

    function __construct($get_weight, $get_length, $get_width, $get_height)
    {
        $this->weight = $get_weight;
        $this->length = $get_length;
        $this->width = $get_width;
        $this->height = $get_height;
    }

    function getWeight()
    {
      return $this->weight;
    }

    function getLength()
    {
      return $this->length;
    }

    function getWidth()
    {
      return $this->width;
    }

    function getHeight()
    {
      return $this->height;
    }

    function getVolume() {
      return $this->getLength() * $this->getWidth() * $this->getHeight();
    }

    function costToShip() {
      return $this->getVolume() * .6;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shipping Details Page</title>
</head>
  <body>
      <h1>Shipping Costs</h1>
      <?php
        $get_weight = $_GET["weight"];
        $get_length = $_GET["length"];
        $get_width = $_GET["width"];
        $get_height = $_GET["height"];
        $new_parcel = new Parcel($_GET["weight"],$_GET["length"], $_GET["width"], $_GET["height"]);
        $get_volume = $new_parcel->getVolume();
        $get_price = $new_parcel->costToShip();

        if (!($get_weight) || !($get_length) || !($get_height) || !($get_width)) {
            echo "<p>You must enter all data fields to calculate a cost! Try again!</p>";
        } else {
            echo "<p>Your parcel weight is: $get_weight </p>
            <p>Your parcel length is: $get_length </p>
            <p>Your parcel width is: $get_width </p>
            <p>Your parcel height is: $get_height </p>
            <p>Your parcel volume is: $get_volume </p>
            <p>Your cost to ship: $$get_price </p>";
        }
      ?>
  </body>
</html>
