<?php include('includes/header.php');     ?>
<?php
// (B) PROCESS SEARCH WHEN FORM SUBMITTED
if (isset($_POST["search"])) {
  // (B1) SEARCH FOR USERS
  require "search_recruit.php";
  if (count($results) > 0) { foreach ($results as $r) {
  }} else { echo "No results found"; }
}
  
?>
<table>
    <tr>
        <th scope="col">Image</th>
        <th scope="col">Recruit Name</th>
        <th scope="col">Job</th>
        <th scope="col">Any Military Experience</th>
        <th scope="col">bloodType</th>
        <th scope="col">Delete</th>
        <th scope="col">Edit</th>
    </tr>

    <tr>
        <td><img src="image_uploads/<?php echo $r['image']; ?>" width="100px" height="100px" /></td>
        <td><?php echo $r['recruitName']; ?></td>
        <td><?php echo $r['job']; ?></td>
        <td><?php echo $r['militaryExp']; ?></td>
        <td><?php echo $r['bloodType']; ?></td>


    </tr>
</table>
<p><a href="index.php">Homepage</a></p>
<?php include('includes/footer.php');     ?>