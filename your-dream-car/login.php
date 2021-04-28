<?php
    include_once 'header.php';
 ?>
<section class="signup-form">
	<center><h2 class='text-light'>Log In</h2></center>
	<form action='includes/login.inc.php' method='post'>
    <center><img src="images/login.png" height="300"></center>
		<center><input type="text" name="uid" placeholder="Username/Email..."></center>
		<center><br><input type="password" name="pwd" placeholder="Password..."></br></center>
		<center><br><button type='submit' name='submit'>Log In</button></br></center>
	</form>
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<center><h5 class='text-light'>Complete all fields!</h5></center>";
    }
    else if ($_GET["error"] == "wronglogin") {
      echo "<center><h5 class='text-light'>Credentials are not correct!</h5></center>";
    }
  }
  ?>
</section>

<?php
    include_once 'footer.php';
 ?>
