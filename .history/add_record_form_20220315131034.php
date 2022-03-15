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
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

              <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Recruit Name:</label>
            <input type="input" name="recruitName">
            <br>

            <label>Job:</label>
            <input type="input" name="job">
            <br>        
            
            <label>Any military experience:</label>
            <input type="input" name="militaryExp">
            <br>       

            <label>BloodType:</label>
            <input type="input" name="bloodType">
            <br> 

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Recruit">
            <br>
        </form>
        <form>
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
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Recruit Name</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="recruitName" rows="3"></textarea>
    <label for="exampleFormControlTextarea1">Job</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="job" rows="3"></textarea>
    <label for="exampleFormControlSelect2">Any Military Experience?:</label>
    <select multiple class="form-control" id="exampleFormControlSelect2" name="militaryExp">
      <option>yes</option>
      <option>no</option>
    </select>
  </div>
</form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>