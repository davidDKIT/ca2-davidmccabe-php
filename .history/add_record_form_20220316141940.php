<?php
require('database.php');
$query = 'SELECT *
          FROM categories
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
  <h1>Add Recruit</h1>
  
  <form action="add_record.php" method="post" enctype="multipart/form-data" id="add_record_form">
  <p><a class="btn btn-dark" href="index.php">View Homepage</a></p>
    <div class="form-group">
      <label for="exampleFormControlInput1">Category:</label>
      <select class="form-control" id="exampleFormControlInput1" name="category_id">
        <?php foreach ($categories as $category) : ?>
          <option value="<?php echo $category['categoryID']; ?>">
            <?php echo $category['categoryName']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Recruit Name</label>
      <input class="form-control" id="exampleFormControlTextarea1" name="recruitName" onBlur="recruitName_validation();"><span id="recruitName_err"></span></li>
      <label for="exampleFormControlTextarea1">Job</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="job" rows="3"></textarea>
      <label for="exampleFormControlSelect2">Blood Type:</label>
      <select multiple class="form-control" id="exampleFormControlSelect2" name="bloodType">
        <option>O</option>
        <option>O positive</option>
        <option>A</option>
        <option>B</option>
        <option>AB</option>
      </select>
      <label for="exampleFormControlSelect2">Any Military Experience?:</label>
      <select multiple class="form-control" id="exampleFormControlSelect2" name="militaryExp">
        <option>yes</option>
        <option>no</option>
      </select>
      <label>Image:</label>
      <input class="btn btn-light" type="file" name="image" accept="image/*" />
      <br>
    </div>
    <label>&nbsp;</label>
    <input class="btn btn-dark" type="submit" value="Add Recruit">
    <br>
  </form>
  <a href="index.php"> <button class="btn btn-outline-danger">Cancel</button></a>
  <?php
  include('includes/footer.php');
  ?>