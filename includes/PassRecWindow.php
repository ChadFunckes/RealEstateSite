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
 				<input type="email" class="passrecovery" placeholder="Your email here...">
 				<input type="submit" value="Submit">
 				<a href="passrecRun.php" id="passrecbtn">Send</a>
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

