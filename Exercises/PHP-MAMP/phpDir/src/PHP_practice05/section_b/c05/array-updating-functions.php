<?php
/*
    Write PHP Code to 
    - create array of items (items could be e.g. “notebook”, “pencil”, “eraser”) being ordered
    - add a new item (i.e. “scissors”) to start of an array
    - remove the last item from array
*/
$items = ["notebook", "pencil", "eraser"];
array_unshift($items, "scissors");
array_pop($items);
?>
<?php include 'includes/header.php'; ?>

<h1>Order</h1>

<ul>
    <?php foreach ($items as $item) : ?>
        <li><?= $item; ?></li>
    <?php endforeach; ?>
</ul>

<?php include 'includes/footer.php'; ?>