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
    Step 1: Use the Make a class called Dog
		Step 2: Set some properties for Dog, Example, eye colors, nose, or fur color
		Step 4: Make a method named ShowAll that echos all the properties
		Step 5: Instantiate the class / create object and call it pitbull
    Step 6: Call the method ShowAll
	  */

    class Dog
    {
      public $eyeColor;
      public $nose;
      public $furColor;

      public function __construct($eyeColor, $nose, $furColor)
      {
        $this->eyeColor = $eyeColor;
        $this->nose = $nose;
        $this->furColor = $furColor;
      }

      public function ShowAll()
      {
        echo "Eye Color: $this->eyeColor, Nose: $this->nose, Fur Color: $this->furColor";
      }
    }

    $pitbull = new Dog('Brown', 'Wet', 'Black');
    $pitbull->ShowAll();

    ?>





  </article>
  <!--MAIN CONTENT-->

  <?php include "includes/footer.php"; ?>