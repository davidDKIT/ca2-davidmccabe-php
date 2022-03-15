<?php

// Get the recruit data
$recruit_id = filter_input(INPUT_POST, 'recruit_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
echo $category_id;
$recruitName = filter_input(INPUT_POST, 'recruitName');
$job = filter_input(INPUT_POST, 'job');
$militaryExp = filter_input(INPUT_POST, 'militaryExp');
$bloodType = filter_input(INPUT_POST, 'bloodType');
// Validate inputs
if ($recruit_id == null || $recruit_id == false || $category_id == null || $category_id == false ||
empty($recruitName) || empty($job) || empty($militaryExp)) {
$error = "Invalid recruit data. Check all fields and try again.";
include('error.php');
} else {

/**************************** Image upload ****************************/

$imgFile = $_FILES['image']['name'];
$tmp_dir = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
$original_image = filter_input(INPUT_POST, 'original_image');

if ($imgFile) {
$upload_dir = 'image_uploads/'; // upload directory	
$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$image = rand(1000, 1000000) . "." . $imgExt;
if (in_array($imgExt, $valid_extensions)) {
if ($imgSize < 5000000) {
if (filter_input(INPUT_POST, 'original_image') !== "") {
unlink($upload_dir . $original_image);                    
}
move_uploaded_file($tmp_dir, $upload_dir . $image);
} else {
$errMSG = "Sorry, your file is too large it should be less then 5MB";
}
} else {
$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}
} else {
// if no image selected the old image remain as it is.
$image = $original_image; // old image from database
}

/************************** End Image upload **************************/

// If valid, update the recruit in the database
require_once('database.php');

$query = 'UPDATE recruits
SET categoryID = :category_id,
recruitName = :recruitName,
job = :job,
militaryExp = :militaryExp,
bloodType = :bloodType,
image = :image
WHERE recruitID = :recruit_id';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':recruitName', $recruitName);
$statement->bindValue(':job', $job);
$statement->bindValue(':militaryExp', $militaryExp);
$statement->bindValue(':bloodType', $bloodType);
$statement->bindValue(':image', $image);
$statement->bindValue(':recruit_id', $recruit_id);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('index.php');
}
?>