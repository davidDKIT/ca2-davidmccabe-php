<!-- the head section -->
<?php
if (isset($_POST['submit'])) {
  $searchValue = $_POST['search'];
  $con = new mysqli("localhost", "root", "", "ukraine_signup");
  if ($con->connect_error) {
    echo "connection Failed: " . $con->connect_error;
  } else {
    $sql = "SELECT * FROM recruits WHERE recruitName LIKE '%$searchValue%'";

    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo "Recruit found in database: " . $row['recruitName'] . '<br>' . "Their job associated: " . $row['job'] . '<br>' . '<br>';
    }
  }
}
?>

<head>
  <title>Ukraine Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<!-- the body section -->

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="main.php">Ψ Ukraine</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="category_list.php">Manage Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_record_form.php">Add New Recruit</a>
          </li>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
          <form class="d-flex" action="" method="post">
            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
          </form>


        </ul>
      </div>
    </div>
  </nav>