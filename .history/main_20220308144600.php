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
	<div class="container">
    <h1>Record List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <div>
        <!-- display a table of records -->


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-image">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <?php foreach ($records as $record) : ?>
                            <tbody>
                                <tr>
                                    <td><img src="image_uploads/<?php echo $record['image']; ?>" width="100px" height="100px" /></td>
                                    <td><?php echo $record['name']; ?></td>
                                    <td class="right"><?php echo $record['price']; ?></td>
                                    <td>
                                        <form action="delete_record.php" method="post" id="delete_record_form">
                                            <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                                            <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                                            <input type="submit" value="Delete">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="edit_record_form.php" method="post" id="delete_record_form">
                                            <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                                            <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                                            <input type="submit" value="Edit">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <p><a href="add_record_form.php">Add Record</a></p>
                            <p><a href="category_list.php">Manage Categories</a></p>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h2><?php echo $category_name; ?></h2>
        <?php
        include('includes/footer.php');
        ?>
    </div>

</body>
</html>
