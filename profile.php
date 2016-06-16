<?php
// Initialization
require_once('includes/init.php');
// Add Header
$title = "BizRealty";
include("includes/header.inc.php");
?>
<style>
  .medium-2 {
    width: 480px;
    }
textarea
	{
  		max-width: 100%;
  		max-height: 75%;
	}
address textarea {
	resize:none;
}
	@media only screen and (max-width: 350px) 
    {
    	.medium-2 {
			width: 260px;
		}
		textarea {
			max-width: 50%;
		}
	}
</style>

<div class="row column text-center">
		<h4 style="text-align:left">Profile</h4>
		<hr>
<div class="column">
	<div class="row">
		<div class="medium-2 columns" style="text-align:left">
			<p>Profile:</p>
			<form>
			<img src="#" name="user_pic" width="100px" height="120px" />
			<br><br>
			<label for="aboutme">Bio: 
				<br>
				<textarea class="aboutme" rows="4" cols="20"></textarea>
			</label>
			<label for="address" rows="1" cols="20" expandible="no">Address:</label>
			<address class="address"><textarea></textarea></address>
			<!-- This would be where user chooses their profession in the industry -->
  				<select name="role">
    				<option value="none">Select a profession</option>
    				<option value="Rel">Commercial Real estate Agent</option>
    				<option value="Dev">Property Developer</option>
    				<option value="OI">Owner/Investor</option>
    				<option value="CI">Corporate Investors</option>
    				<option value="PAM">Property/Asset Manager</option>
    				<option value="Ten">Tenant</option>
    				<option value="PAM">Property/Asset Manager</option>
    				<option value="App">Appraiser</option>
    				<option value="LMB">Lender/mortgage Broker</option>
  				</select>
  				<br><br>
  				<input type="submit"><br><br>
  				<!-- This button below takes the user to plan page where they can upgrade their account -->
  				<a href="plans.php"><input type="button" value="Upgrade Account"></button></a> 
  				<br><br>
			</form>
		</div>
	</div>
</div>
<hr>
<?php 

include("includes/LoginWindow.inc.php"); 
include("includes/SignupWindow.inc.php");
include("includes/footer.php");

?> 
