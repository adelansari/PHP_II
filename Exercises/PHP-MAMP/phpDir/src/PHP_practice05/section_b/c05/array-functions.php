<?php
/*
    Write PHP Code to create
        - array of greetings (i.e. “Hi”, “Howdy”, “Hello”, “Hola”, “Cia”, “Moi”, “Namaste”, “Welcome”) 
        - then display random greeting-find array of best sellers of items (i.e. “notebook”, “pencil”, “ink”) 
        - count items and display top items
        - create an array holding customer details (e.g firstname, lastname, email). 
        - and if you have customer first name add it to greeting
*/

$greetings = ["Hi", "Howdy", "Hello", "Hola", "Cia", "Moi", "Namaste", "Welcome"];
$bestSellers = ["notebook" => 150, "pencil" => 200, "ink" => 100];
$customer = [
    "firstName" => "Adel",
    "lastName" => "Ansari",
    "email" => "adelansari.a@gmail.com"
];

$randomGreeting = $greetings[array_rand($greetings)];

// sorting
$bestSellerSorted = $bestSellers;
arsort($bestSellerSorted);

[$topItem, $topSales] = [key($bestSellers), reset($bestSellers)];
$totalItems = array_sum($bestSellers);
$customerGreeting = $customer["firstName"] ? "$randomGreeting {$customer["firstName"]}" : $randomGreeting;
?>

<?php include 'includes/header.php'; ?>

<h1>Best Sellers</h1>
<!-- Write code here -->
<p>Random Greeting: <?= $randomGreeting; ?></p>
<p>Total Items Sold: <?= $totalItems; ?></p>
<p>Top Items:</p>

<ol>
    <?php foreach ($bestSellerSorted as $item => $sales) : ?>
        <li><?= "$item ({$sales})"; ?></li>
    <?php endforeach; ?>
</ol>

<p>Customer Greeting: <?= $customerGreeting; ?></p>



<?php include 'includes/footer.php'; ?>