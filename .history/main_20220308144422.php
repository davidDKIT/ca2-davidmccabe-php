<!DOCTYPE html>
<?php
require_once('database.php');
error_reporting(E_ERROR | E_PARSE);
// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(
        INPUT_GET,
        'category_id',
        FILTER_VALIDATE_INT
    );
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
?>
<html>
<head>
<title>Ukriane</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<!-- <link rel="stylesheet" type="text/css" href="./main.scss"/> -->

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>

<div class="container-fluid banner">
		<!-- <div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-md">
					<div class="navbar-brand">Ukraine Sign Up Form</div>
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="#">HOME</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">PORTFOLIO</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ABOUT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">CONTACT</a>
						</li>
					</ul>
				</nav>
			</div> -->
			<?php include('includes/header.php');?>
			<div class="col-md-8 offset-md-2 info">
				<h1 class="text-center">Ukraine Military</h1>
				<p class="text-center">
        “There is no flag large enough to cover the shame of killing innocent people.”
				</p>
				<a href="index.php" class="btn btn-md text-center">GET STARTED</a>
				<a type="button" class="btn btn-md text-center" onClick="document.getElementById('middle').scrollIntoView();"></a>
			</div>
		</div>
	</div>

</body>
</html>