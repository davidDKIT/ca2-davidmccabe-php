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
<div class="container">

    <?php
    include('includes/header.php');
    ?>
    <div class="sidebar">
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>
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

    <section>
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
    </section>



    <!-- /.container-fluid -->