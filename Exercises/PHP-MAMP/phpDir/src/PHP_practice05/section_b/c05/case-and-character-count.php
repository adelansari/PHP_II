<?php
/*
  Write PHP Code to convert case in lowercase, uppercase, count number of characters and word count
*/
$text = 'Home sweet home';
?>
<?php include 'includes/header.php'; ?>

<p>Original Text: <?= $text; ?></p>
<p>Lowercase: <?= strtolower($text); ?></p>
<p>Uppercase: <?= strtoupper($text); ?></p>
<p>Character Count: <?= strlen($text); ?></p>

<?php include 'includes/footer.php'; ?>