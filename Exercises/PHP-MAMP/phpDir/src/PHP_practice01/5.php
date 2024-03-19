<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>
<section class="content">

  <aside class="col-xs-4">
    <?php Navigation(); ?>


  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">


    <?php
    /* 
        Step1: Use a pre-built math function here and echo it
        Step 2:  Use a pre-built string function here and echo it
        Step 3:  Use a pre-built Array function here and echo it
      */

    $arr = [1, 2, 3, 4, 5, 6];

    echo "<p>" . pow(2, 3) . " is the result of 2 raised to the power of 3</p>";
    echo "<p>" . strtoupper("hello world") . " converts the string to uppercase</p>";
    echo "<p>" . max($arr) . " is the maximum value in the array</p>";
    echo "<p>" . min($arr) . " is the minimum value in the array</p>";
    echo "<p>" . count($arr) . " is the number of elements in the array</p>";
    echo "<p>" . sort($arr) . " sorts the array in ascending order</p>";
    echo "<p>" . print_r($arr) . " prints the array</p";
    ?>





  </article>
  <!--MAIN CONTENT-->
  <?php include "includes/footer.php"; ?>