<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
<?php
include('includes/header.php');
?>
    
    <form class="form-control" style = "text-align: center; display: inline-block" action="add_category.php" method="post"
          id="add_category_form">
        <label>Name:</label>
        <input type="input" name="name">
        <input class="btn btn-dark" id="add_category_button" type="submit" value="Add">
    </form>
    <h2>Category List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form style = "text-align: center; display: inline-block" class="form-control" action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input class= "btn" type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php"> <button class="btn btn-outline-danger">Cancel</button></a>
    <br>
    <br>
    <?php
include('includes/footer.php');
?>