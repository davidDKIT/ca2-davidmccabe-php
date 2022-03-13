<!DOCTYPE html>
<html>
<link rel="stylesheet" type="css/scss" href="error.scss" />
<!-- the head section -->

<head>
    <title>Ministry Of Defense Ukraine</title>
    <link rel="stylesheet" type="css/scss" href="error.scss">
</head>

<!-- the body section -->

<body>
    <header>
        <h1>Ukraine</h1>
    </header>

    <main>
        <h2 class="top">Error!</h2>
        <p><?php echo $error; ?></p>

    </main>
    <div class="number">
        <h1>404 </h1>
        <h2>Page not found <i class="text">sentiment_very_dissatisfied</i></h2>
    </div>


    <footer>
        <p>&copy; <?php echo date("Y"); ?> Ministry Of Defense Of Ukraine.</p>
    </footer>
</body>

</html>