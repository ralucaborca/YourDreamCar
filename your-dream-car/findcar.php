<?php
    include_once 'header.php';
 ?>
<section class="signup-form">
	<center><h2 class='text-light'>Let's find your dream car!</h2></center>
	<form action='includes/findcar.inc.php' method='post'>
	<p class=" text-light" style="background-color: #000000;">1. What's your budget?</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q1" value="<5000"/><5000</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q1" value="5000-10000"/> 5000-10000 </p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q1" value="10000-20000"/> 10000-20000 </p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q1" value=">20000"/> >20000 </p>
	<p class=" text-light" style="background-color: #000000;">2. How many kids do you have?</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q2" value="0"/> 0</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q2" value="1"/> 1</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q2" value="2"/> 2</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q2" value="3"/> 3</p>
	<p class=" text-light" style="background-color: #000000;">3. How many kilometres do you make within a year?</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q3" value="<10000"/> <10000</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q3" value="10000-15000"/> 10000-15000</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q3" value=">15000"/> >15000 </p>
	<p class=" text-light" style="background-color: #000000;">4. Do you usually drive on bumpy roads?</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q4" value="yes"/>yes</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q4" value="no"/>no</p>
	<p class=" text-light" style="background-color: #000000;">5. What's more important to you? Fuel economy or performance?</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q5" value="fuel economy"/>fuel economy</p>
	<p class=" text-light" style="background-color: #000000;"> <input type="radio" name="q5" value="performance"/> performance</p>
	<br><button type='submit' name='submit'>Show Cars</button></br>
	<center><p class=" text-light" style="background-color: #000000;">Plase check one answer for all the questions!</p></center>
	</form>
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyFindCar") {
      echo "<center><h5 class='text-light'>Plase check one answer for all the questions!</h5></center>";
    }
  }
  ?>
</section>

<?php
    include_once 'footer.php';
 ?>
