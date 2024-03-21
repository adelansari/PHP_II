<?php
$path = 'img/logo.png';

/*
Write PHP Code to show file informations of “logo.png” e.g.
- file name
-file size
- MIME type and 
- Folder
- If no such file exits display “There is no such file”
Note: You can use PHP in-built function e.g. pathinfo, filesize, mime_content_type
*/
?>
<?php include 'includes/header.php'; ?>

<!-- // Write you PHP code here -->
<?php
if (file_exists($path)) :
    $fileInfo = pathinfo($path);
    $fileSize = filesize($path);
    $fileMime = mime_content_type($path);
    $folder = $fileInfo['dirname'];
?>
    <h1>File Information</h1>
    <p>File Name: <?= $fileInfo['basename']; ?></p>
    <p>File Size: <?= $fileSize; ?></p>
    <p>MIME Type: <?= $fileMime; ?></p>
    <p>Folder: <?= $folder; ?></p>
<?php else : ?>
    <p>There is no such file</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>