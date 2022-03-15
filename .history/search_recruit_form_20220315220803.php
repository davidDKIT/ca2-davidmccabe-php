<?php
if (isset($_POST["search"])) {
  // (B1) SEARCH FOR USERS
  require "search_recruit.php";
  if (count($results) > 0) { foreach ($results as $r) {
  }} else { echo "No results found"; }
}
  
?>
<section>
<div class="main-container">
<?php
include('includes/header.php');
?>
<h2 class="search-title">Search Results</h2>
<div class="table-responive-sm">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Image</th>
<th scope="col">Recruit Name</th>
<th scope="col">Job</th>
<th scope="col">Military Experience</th>
<th scope="col">Blood Type</th>
</tr>
</thead>
<tr>
<td><img src="image_uploads/<?php echo $r['image']; ?>" width="100px" height="100px" /></td>
<td><?php echo $r['recruitName']; ?></td>
<td class="right"><?php echo $r['job']; ?></td>
<td><?php echo $r['militaryExp']; ?></td>
<td class="right"><?php echo $r['bloodType']; ?></td>
  </tr>
  </table>
</div>

  <p><a href="index.php"><button class="btn btn-outline-dark">Home Page</button></a></p>
</div>
</section>
<?php
include('includes/footer.php');
?>