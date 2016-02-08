<?php
class Triangle
{
    private $side1;
    private $side2;
    private $side3;

    function __construct($get_side1, $get_side2, $get_side3)
    {
      $this->side1 = $get_side1;
      $this->side2 = $get_side2;
      $this->side3 = $get_side3;
    }

    function getSide1()
    {
      return $this->side1;
    }

    function getSide2()
    {
      return $this->side2;
    }

    function getSide3()
    {
      return $this->side3;
    }

    function isTriangle()
    {
      if ((($this->getSide1() + $this->getSide2()) <= $this->getSide3()) || (($this->getSide1() + $this->getSide3()) <= $this->getSide2()) || (($this->getSide3() + $this->getSide2()) <= $this->getSide1())) {
        return false;
      } else {
        return true;
      }
    }

    function isEquilateral()
    {
      if ($this->getSide1() == $this->getSide2() && $this->getSide1() == $this->getSide3()) {
        return true;
      } else {
        return false;
      }
    }

    function isScalene()
    {
      if ($this->getSide1() != $this->getSide2()  && $this->getSide2() != $this->getSide3() && $this->getSide1() != $this->getSide3()) {
        return true;
      } else {
        return false;
      }
    }

    function isIsosceles()
    {
      if ((($this->getSide1() == $this->getSide2() || $this->getSide3()) && ($this->getSide2() != $this->getSide3())) || (($this->getSide2() == $this->getSide1() || $this->getSide3()) && ($this->getSide1() != $this->getSide3())) || (($this->getSide3() == $this->getSide2() || $this->getSide1()) && ($this->getSide2() != $this->getSide1()))) {
        return true;
      } else {
        return false;
      }
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Triangle</title>
</head>
  <body>
      <h1>What kind of triangle is it?</h1>
      <?php
        $get_side1 = $_GET["length1"];
        $get_side2 = $_GET["length2"];
        $get_side3 = $_GET["length3"];
        $new_triangle = new Triangle($_GET["length1"],$_GET["length2"],$_GET["length3"]);
        $is_triangle = $new_triangle->isTriangle();
        $get_equilateral = $new_triangle->isEquilateral();
        $get_scalene = $new_triangle->isScalene();
        $get_isosceles = $new_triangle->isIsosceles();

        if ($is_triangle) {
          if ($get_equilateral) {
            echo "<p>Your triangle is equilateral!</p>";
          } elseif ($get_scalene) {
            echo "<p>Your triangle is scalene!</p>";
          } else {
            echo "<p>Your triangle is isosceles!</p>";
          }
          } else {
            echo "<p>This is not a triangle! Try again!</p>";
          }
      ?>
  </body>
</html>
