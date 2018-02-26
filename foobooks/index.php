<?php
    require 'helpers.php';
    require 'logic.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>foobooks</h1>

        <?php if ($searchTerm) : ?>
            <p>You searched for
                <em>
                    <?= sanitize($searchTerm); ?>
                </em>
            </p>
        <?php else : ?>
            <p> Welcome to foobooks. </p>
        <?php endif; ?>

        <?php if ($haveResults) : ?>
            <?php foreach ($books as $title => $book) : ?>
                <div class='book'>
                    <?= $title; ?> by <?= $book['author']; ?>
                </div>
            <?php endforeach; ?>
        <?php elseif ($searchTerm) : ?> 
            No results.
        <?php endif; ?>

        <form method='GET' action='index.php'>
            <label>Search for a book:
                <input type='text' name='searchTerm' value='<?=sanitize($searchTerm); ?>'>
            </label>
            <input type='submit' value='Search'>
        </form>
    </body>
</html>