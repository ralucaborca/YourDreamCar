<?php
    include_once 'header.php';
 ?>
<section class="signup-form">
	<center>
	<h2 class='text-light'>Sign Up Form</h2>
	<form action='includes/signup.inc.php' method='post'>
		<center><img src="images/register.jpg"></center>
		<h4 class='text-light'>Name</h4>
		<input type="text" name="name" placeholder="full name">
		<h4 class='text-light'>Email</h4>
		<input type="text" name="email" placeholder="email">
		<h4 class='text-light'>Username</h4>
		<input type="text" name="username" placeholder="username">
		<h4 class='text-light'>Password</h4>
		<input type="password" name="pwd" placeholder="password">
		<h4 class='text-light'>Password</h4>
		<input type="password" name="pwdRepeat" placeholder="password again">
		<h4 class='text-light'></h4>
		<button type='submit' name='submit'>Sign Up</button>
	</form>
	</center>

  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<h5 class='text-light'>Complete all fields!</h5>";
    }
    else if ($_GET["error"] == "invaliduid") {
      echo "<h5 class='text-light'>Use a valid username!</h5>";
    }
    else if ($_GET["error"] == "invalidemail") {
      echo "<h5 class='text-light'>Use a valid email!</h5>";
    }
    else if ($_GET["error"] == "passwordsdontmatch") {
      echo "<h5 class='text-light'>Passwords don't match!</h5>";
    }
    else if ($_GET["error"] == "stmtfailed") {
      echo "<h5 class='text-light'>Please try again!</h5>";
    }
    else if ($_GET["error"] == "invaliduid") {
      echo "<h5 class='text-light'>Use another username!</h5>";
    }
    else if ($_GET["error"] == "usernametaken") {
      echo "<h5 class='text-light'>Use another username!</h5>";
    }
    else if ($_GET["error"] == "none") {
      echo "<h5 class='text-light'>You have successfully signed up!</h5>";
    }
  }
  ?>
</section>

<?php
    include_once 'footer.php';
 ?>
