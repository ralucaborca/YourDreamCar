  <?php
    include_once 'header.php';
 ?>
<center><section class="signup-form">
	<h2 class='text-light'>Adding a car</h2>
	<form action='includes/addCar.inc.php' method='post' enctype="multipart/form-data">
		<input type="text" name="brand" placeholder="Brand...">
		<input type="textbox" name="model" placeholder="Model...">
    <input type="textbox" name="year" placeholder="Year...">
    <input class="text-light" type="file" name="picture"></input>

		<button type='submit' name='submit'>Add Car</button>
	</form>
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<center><h5 class='text-light'>Complete all the fields!</h5></center>";
    }
    if ($_GET["error"] == "stmtfailed") {
      echo "<center><h5 class='text-light'>Connection error!</h5></center>";
    }
    if ($_GET["error"] == "none") {
      echo "<center><h5 class='text-light'>Car successfully added!</h5></center>";
    }
  }
  ?>
</section></center>

<?php
    include_once 'footer.php';
 ?>