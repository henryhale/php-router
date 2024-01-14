<?php require __DIR__ . '/parts/header.php' ?>

<h1>Resource Not Found</h1>

<?php
if (isset($_GET['err'])) {
    echo '<p>' . urldecode($_GET['err']) . '</p>';
}
?>

<a href="/">&leftarrow; Home</a>

<?php require __DIR__ . '/parts/footer.php' ?>