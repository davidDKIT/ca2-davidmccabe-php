<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />

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

// Get recruits for selected category
$queryrecruits = "SELECT * FROM recruits
WHERE categoryID = :category_id
ORDER BY recruitID";
$statement3 = $db->prepare($queryrecruits);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$recruits = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">


    <h1>Recruit List</h1>
    <?php
    include('includes/header.php');
    ?>
    <!-- display a list of categories -->
    <h2>Categories</h2>
    <div class="text-center">
        <ul class = "list-group list-group-horizontal-sm">
            <?php foreach ($categories as $category) : ?>
                <li class="list-group-item">
                    <a class="btn btn-light" href=".?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>



    <section>
        <!-- display a table of recruits -->


        <div class="text-center">
            <div class="row">
                <div class="col-12">
                    <table class="table caption-top">
                        <caption>List of users</caption>
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Recruit Name</th>
                                <th scope="col">Job</th>
                                <th scope="col">Any Military Experience</th>
                                <th scope="col">bloodType</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Add</th>
                            </tr>
                        </thead>
                        <?php foreach ($recruits as $recruit) : ?>
                            <tbody>
                                <tr>
                                    <td><img src="image_uploads/<?php echo $recruit['image']; ?>" width="100px" height="100px" /></td>
                                    <td><?php echo $recruit['recruitName']; ?></td>
                                    <td class="right"><?php echo $recruit['job']; ?></td>
                                    <td class="right"><?php echo $recruit['militaryExp']; ?></td>
                                    <td class="right"><?php echo $recruit['bloodType']; ?></td>
                                    <td>
                                        <form class="form-check" action="delete_record.php" method="post" id="delete_record_form">
                                            <input class="btn btn-dark" type="hidden" name="recruit_id" value="<?php echo $recruit['recruitID']; ?>">
                                            <input class="btn btn-dark" type="hidden" name="category_id" value="<?php echo $recruit['categoryID']; ?>">
                                            <input class="btn btn-dark" type="submit" value="Delete">
                                        </form>
                                    </td>
                                    <td>
                                        <form class="form-check" action="edit_record_form.php" method="post" id="delete_record_form">
                                            <input class="btn btn-dark" type="hidden" name="recruit_id" value="<?php echo $recruit['recruitID']; ?>">
                                            <input class="btn btn-dark" type="hidden" name="category_id" value="<?php echo $recruit['categoryID']; ?>">
                                            <input class="btn btn-dark" type="submit" value="Edit">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>

                    </table>
                    <p><a class="btn btn-dark" href="add_record_form.php">Add recruit</a></p>
                    <p><a class="btn btn-dark" href="category_list.php">Manage Categories</a></p>
                </div>
            </div>
        </div>

        <h2><?php echo $category_name; ?></h2>
        <?php
        include('includes/footer.php');
        ?>
    </section>



    <!-- /.container-fluid -->