<?php
// Initialization
require_once('includes/init.php');
// Add Header
$title = "BizRealty";
include("includes/header.inc.php");
?>
<link rel="stylesheet" type="text/css" href="css/planchoosebtns.css">
 
<hr>
<div class="row">
  <div class="medium-2 columns">Please Choose a plan: |</div>
   
  <div class="medium-3 columns" style="background-color: #fff; height:400px; color:gray; font-size:14px">
  Silver<hr>
	  <ul style="text-align: left">
	  	<li style="font-weight: lighter">Basic Property Searches</li><br>
	  	<li style="font-weight: lighter">25 property listings per month</li><br>
	  	<li style="font-weight: lighter">25 property listings per month</li><br>
	  	<li style="font-weight: lighter">25 property listings per month</li>
	  </ul>
  	<hr><a href="payments.php"><input type="button" value="Choose this plan" id="btn1"></button></a>
  </div>
  <div class="medium-3 columns" style="background-color: #fff; height:400px; color:gray; font-size:14px">
  Gold<hr>
	  <ul style="text-align: left">
	  	<li style="font-weight: lighter">Detailed Property Searches</li><br>
	  	<li style="font-weight: lighter">50 property listings per month</li><br>
	  	<li style="font-weight: lighter">Access to limited professional profiles</li><br>
	  	<li style="font-weight: lighter">Listing visibility to limited members category</li>
	  </ul>
	  <hr><a href="payments.php"><input type="button" value="Choose this plan" id="btn2"></button></a>
  </div>
  <div class="medium-3 columns end" style="background-color: #fff; height:400px; color:gray; font-size:14px">
  Platinum<hr>
	  <ul style="text-align: left">
	  	<li style="font-weight: lighter">Premium Property Searches</li><br>
	    <li style="font-weight: lighter">Unlimited property listings </li><br>
	  	<li style="font-weight: lighter">Access to all professional profiles</li><br>
	  	<li style="font-weight: lighter">Listing visibility to all members</li>
	  </ul>
	  <hr><a href="payments.php"><input type="button" value="Choose this plan" id="btn3"></button></a>
  </div>
</div>	 
<hr>
<?php 

include("includes/LoginWindow.inc.php"); 
include("includes/SignupWindow.inc.php");
include("includes/footer.php");

?> 