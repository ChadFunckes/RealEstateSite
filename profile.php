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
						<input class="yourfname" id="fn" type=text />
					</label>
					<label for="yourlname">Last Name: 
						<input class="yourlname" id="ln" type=text /> 
					</label>
					<label for="userName">User Name: 
						<input class="userName" id="usernm" type=text />
					</label>
					<label for="pwd">Password: 
						<input class="pwd" id="pass" type=password />
					</label>
					<label for="aboutme">Bio: 
						<br>
						<textarea class="aboutme" id="me" rows="4" cols="20"></textarea>
					</label>
					<label for="address" rows="1" cols="20" expandible="no">Address:
						<textarea class="address"></textarea> 
					</label>
					<label for="wb">Work Portfolio: 
						<br>
						<textarea class="wb" id="wp" rows="4" cols="20"></textarea>
					</label>
					<label for="skype">Skype ID: 
						<br>
						<input type="number" class="skype" id="sky" maxlength="18">
					</label>
					<label for="phone">Phone: 
						<br>
						<input type="tel" class="phone" id="fon" maxlength="12">
					</label>
					<label for="skype">Fax: 
						<br>
						<input type="number" class="fax" id="facsmile" maxlength="14">
					</label>
		
					<label for="role">Role: 
					<!-- This would be where user chooses their profession in the industry -->
		  				<select class="role" id="iam">
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
		  			</label>
		  				<br><br>
		  				<input type="submit">
		  				<br><br>
			</form>
 
		</div>
	</div>
</div>
<script>
	// add person to DB
	$.ajax({
		url: 'proUpdater.php',
		type: 'post',
		dataType: 'text',
		async: 'false',
		data: "&yourfname=" + $("#fn").val() + "&yourlname="+ $("#ln").val() + "&userName=" + $("#usernm").val() + 
		      "&pwd=" + $("#pass").val() + "&aboutme=" + $("#me").val() + "&wb" + $('#wp').val() + "&skype" + $('#sky').val() + 
		      "&phone" + $('#fon').val() + "&fax" + $('#facsmile').val() + "&role" + $('#iam').val(),	
		success: function (data) { 
			// if data = true then the user was added, false the user was declined for some reason
			if (data == "true") {
			// go to profile page 
				window.location.href = "\profile2.php"; 
			}
			else if (data == "false"){
				alert("database error, please try again");
			}
		},
		error: function (data) {
			alert("Some kind of error occured in updating your profile, please try again");
		}
	});
	
});

</script>
<hr>
<?php 

include("includes/LoginWindow.inc.php"); 
include("includes/SignupWindow.inc.php");
include("includes/footer.php");

?> 
