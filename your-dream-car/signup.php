<?php
    include_once 'header.php';
 ?>
<section class="signup-form">
	<h2 class='text-light'>Sign Up</h2>
	<form action='includes/signup.inc.php' method='post'>
		<input type="text" name="name" placeholder="full name">
		</n>
		<input type="text" name="email" placeholder="email">
		<input type="text" name="username" placeholder="username">
		<input type="password" name="pwd" placeholder="password">
		<input type="password" name="pwdRepeat" placeholder="password again">
		<button type='submit' name='submit'>Sign Up</button>
	</form>

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
