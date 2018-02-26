<?php
require('book.php');

use foobooks\Book;

$book = new Book();

$booksJson = file_get_contents('books.json');

$books = json_decode($booksJson, true);

$haveResults = false;

$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : false;

if (isset($_GET['searchTerm'])) {
    $searchTerm = $_GET['searchTerm'];

    foreach ($books as $title => $book) {
        if ($title != $searchTerm) {
            unset($books[$title]);
        }
    }
    if (count($books) > 0) {
        $haveResults = true;
    }
}

jQuery('button[data-type="submit-file-upload"]').hide();
jQuery('button[data-type="submit-file-upload"]').trigger('click');



