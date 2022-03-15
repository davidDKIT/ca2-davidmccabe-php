<?php
require('database.php');

$recruit_id = filter_input(INPUT_POST, 'recruit_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM recruits
          WHERE recruitID = :recruit_id';
$statement = $db->prepare($query);
$statement->bindValue(':recruit_id', $recruit_id);
$statement->execute();
$recruits = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

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
       <h1>Edit Recruit</h1>
       <form action="edit_record.php" method="post" enctype="multipart/form-data" id="add_record_form">
              <input type="hidden" name="original_image" value="<?php echo $recruits['image']; ?>" />
              <input type="hidden" name="recruit_id"
                   value="<?php echo $recruits['recruitID']; ?>">

              <!-- <label>Category ID:</label> -->
              <!-- <input type="category_id" name="category_id" value="<?php //echo $recruits['categoryID']; ?>"> -->
              <label for="formGroupExampleInput">Category ID:</label>
              <select class="form-control" id="exampleFormControlSelect2" name="category_id">
                     <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['categoryID']; ?>">
                                   <?php echo $category['categoryName']; ?>
                            </option>
                     <?php endforeach; ?>
              </select>
              <br>

              <label>Recruit Name:</label>
              <input type="input" name="recruitName" value="<?php echo $recruits['recruitName']; ?>">
              <br>

              <label>Job:</label>
              <input type="input" name="job" value="<?php echo $recruits['job']; ?>">
              <br>
              <label>Any Military Experience:</label>
              <input type="input" name="militaryExp" value="<?php echo $recruits['militaryExp']; ?>">
              <br>
              <label>Blood Type Of Recruit:</label>
              <input type="input" name="bloodType" value="<?php echo $recruits['bloodType']; ?>">
              <br>

              <label>Image:</label>
              <input type="file" name="image" accept="image/*" />
              <br>
              
              <?php if ($recruits['image'] != "") { ?>
                     <p><img src="image_uploads/<?php echo $recruits['image']; ?>" height="150" /></p>
              <?php } ?>

              <label>&nbsp;</label>
              <input type="submit" value="Save Changes">
              <br>
       </form>
       <p><a href="index.php">View Homepage</a></p>
       <?php
       include('includes/footer.php');
       ?>