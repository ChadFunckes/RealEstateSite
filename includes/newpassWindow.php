<?php
// Initialization
require_once('includes/init.php');
// Add Header
$title = "BizRealty";
include("includes/header.inc.php");
?>
 
<body>
<hr />
<div class="column">
	<div class="row">
			<h6>Please enter your email address:</h6>
 			<form id="passrec" style="width: 340px">
 				<input type="password" class="pass1rec" placeholder="Enter a password">
 				<input type="password" class="pass2rec" placeholder="Re-enter your password">
 				<input type="submit" value="Submit">
 				<a href="resetDone.php" id="resetbtn">Send</a>  <!-- <--the page resetDone.php has not been created yet -->
 			</form>
	</div> <br>
</div>
<hr>
<script>
      $(document).foundation();
</script>
</body>

<?php 

include("includes/LoginWindow.inc.php"); 
include("includes/SignupWindow.inc.php");
include("includes/footer.php");

?> 