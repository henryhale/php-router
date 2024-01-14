<?php

$count = 0;

if (isset($_POST)) {
    $count = filter_input(INPUT_POST, 'count', FILTER_SANITIZE_NUMBER_INT);

    $count++;
}

require __DIR__ . '/parts/header.php';
?>

<h1>Forms</h1>

<form action="/data" method="post">
    <label for="count">Count:</label>
    <br />
    <input type="number" name="count" id="count" value="<?= $count ?>" readonly>
    <br>
    <button type="submit">INCREMENT</button>
</form>

<a href="/">&leftarrow; Home</a>

<?php require __DIR__ . '/parts/footer.php' ?>