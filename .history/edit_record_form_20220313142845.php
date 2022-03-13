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
?>
<!-- the head section -->
<div class="container">
       <?php
       include('includes/header.php');
       ?>
       <h1>Edit Recruit</h1>
       <form action="edit_record.php" method="post" enctype="multipart/form-data" id="add_record_form">
              <input type="hidden" name="original_image" value="<?php echo $recruits['image']; ?>" />
              <input type="hidden" name="record_id" value="<?php echo $recruits['recruitID']; ?>">

              <label>Category ID:</label>
              <input type="category_id" name="category_id" value="<?php echo $recruits['categoryID']; ?>">
              <br>

              <label>Recruit Name:</label>
              <input type="input" name="name" value="<?php echo $recruits['recruitName']; ?>">
              <br>

              <label>Recruit Job:</label>
              <input type="input" name="price" value="<?php echo $recruits['job']; ?>">
              <br>
              <label>Date of Registration:</label>
              <input type="input" name="price" value="<?php echo $recruits['dateOfReg']; ?>">
              <br>
              <label>Blood Type:</label>
              <input type="input" name="price" value="<?php echo $recruits['bloodType']; ?>">
              <br>

              <label>Image:</label>
              <input type="file" name="image" accept="image/*" />
              <br>
              <?php if ($recruits['image'] != "") { ?>
                     <? return $recruits['image'] ?? 'default value'; ?>
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