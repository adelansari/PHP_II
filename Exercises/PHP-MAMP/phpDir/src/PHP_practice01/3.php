<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>

<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>

	</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">

		<?php

		/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP

			Step 2: Make a forloop  that displays 10 numbers

			Step 3 : Make a switch Statement that test againts one condition with 5 cases
 		*/

		$likePHP = true;
		if ($likePHP) {
			echo "I love PHP";
		} else {
			echo "I don't love PHP";
		}

		echo "<br>";

		for ($i = 0; $i < 10; $i++) {
			echo $i . "<br>";
		}

		echo "<br>";

		$lang = "PHP";
		switch ($lang) {
			case "Python":
				echo "Python";
				break;
			case "Java":
				echo "Java";
				break;
			case "C++":
				echo "C++";
				break;
			case "C#":
				echo "C#";
				break;
			case "PHP":
				echo "PHP";
				break;
			default:
				echo "No match";
		}


		?>






	</article><!--MAIN CONTENT-->

	<?php include "includes/footer.php"; ?>