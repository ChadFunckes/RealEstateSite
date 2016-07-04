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
	<div class="column">
	<div class="row">
		<div class="medium-2 columns" style="text-align:left">
			<h4>Profile:</h4>
			<script src="jquery.min.js"></script>
			<script>
			$(document).ready(function(){
			    $("button").click(function(){
			        $.get("profile.php", function(data, status){
			            alert("Data: " + data + "\nStatus: " + status);
			        });
			    });
			});
			</script>
 
			</head>
			<body>
			<button>Edit</button>
			<form>
			 
					<img src="#" name="user_pic" width="100px" height="120px" /><br /><br /> <?php // NEED TO FIGURE THIS OUT ?>
					<label for="yourfname">First Name:	
						<?php echo $_SESSION['yourfname']; ?>
					</label>
					<label for="yourlname">Last Name: 
						<?php echo $_SESSION['yourlname']; ?>
					</label>
					<label for="userName">User Name: 
						<?php echo $_SESSION['userName']; ?>
					</label>
					<label for="pwd">Password: 
						<?php echo $_SESSION['pwd']; ?>
					</label>
					<label for="aboutme">Bio: 
						<br>
						<?php echo $_SESSION['aboutme']; ?>
					</label>
					<label for="address" rows="1" cols="20" expandible="no">Address:
						<?php echo $_SESSION['address']; ?> 
					</label>
					<label for="wb">Work Portfolio: 
						<br>
						<?php echo $_SESSION['wb']; ?>
					</label>
					<label for="skype">Skype ID: 
						<br>
						<?php echo $_SESSION['skyope']; ?>
					</label>
					<label for="phone">Phone: 
						<br>
						<?php echo $_SESSION['phone']; ?>
					</label>
					<label for="skype">Fax: 
						<br>
						<?php echo $_SESSION['fax']; ?>
					</label>
		
					<label for="role">Role: 
					<!-- This would be where user chooses their profession in the industry -->
		  				<?php echo $_SESSION['role']; ?>
		  			</label>
		  				<br><br>
		  				<a href="profile.php"><input type="button" value="Edit"></a><br><br>
  				<!-- This button below takes the user to plan page where they can upgrade their account -->
  				<br><br>
			</form>
			<a href="plans.php"><input type="button" value="Upgrade Account"></a> <br><br>
		</div>
	</div>
</div>
 
<hr>
<?php 

include("includes/LoginWindow.inc.php"); 
include("includes/SignupWindow.inc.php");
include("includes/footer.php");

?> 
