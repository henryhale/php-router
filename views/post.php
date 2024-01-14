<?php require __DIR__ . '/parts/header.php' ?>

<h1>Blog Post</h1>

<p>Post ID: <?= $params['id'] ?></p>
<p>Author ID: <?= $params['author'] ?></p>

<a href="/">&leftarrow; Home</a>

<?php require __DIR__ . '/parts/footer.php' ?>