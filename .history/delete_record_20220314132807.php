<?php
require_once('database.php');

// Get IDs
$recruit_id = filter_input(INPUT_POST, 'recruit_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($recruit_id != false) {
    $query = "DELETE FROM recruits
              WHERE recruitID = :recruit_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':recruit_id', $recruit_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
?>