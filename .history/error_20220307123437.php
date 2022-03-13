<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="main.css" />
<!-- the head section -->
<style>
    @import "lesshat";
@import url(https://fonts.googleapis.com/css?family=Roboto);
html { 
  background:  url(https://38.media.tumblr.com/546c0cd48d71f210f9b67a389003790d/tumblr_neq0yw9rMA1tm16jjo1_500.gif) no-repeat center center fixed; 
  background-size: cover;
	font-family: 'Roboto', sans-serif;

}
h1{
  font-size: 16em;
  margin: .2em .5em;
  color: rgba(255,255,255, 0.7);
  margin-bottom:0px;
}
h2{
  font-size: 1.7em;
  margin: .2em .5em;
  color: rgba(255,255,255, 0.6);
	.material-icons {
		font-size: 1.5em;
		position: relative;
		top: 10px;
	}
}
div.error{
  position:absolute;
  top:30%;
  margin-top:-8em;
  width:100%;
  text-align:center;
}
</style>
<head>
    <title>Ministry Of Defense Ukraine</title>
    <link rel="stylesheet" type="text/css" href="main.css">
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
    <div class="error">
        <h1>404 </h1>
        <h2>Page not found <i class="material-icons">sentiment_very_dissatisfied</i></h2>
    </div>


    <footer>
        <p>&copy; <?php echo date("Y"); ?> Ministry Of Defense Of Ukraine.</p>
    </footer>
</body>

</html>