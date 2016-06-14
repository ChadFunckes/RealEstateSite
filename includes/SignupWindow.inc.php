<!-- Signup box section -->

<div id=signup>
	<div id=signupBox>
	<h3>Signup Please</h3>
	<form id="signupForm">
		<label for="name">First Name
			<input id=Sfname class="inputBox" name="fname" type="text" required="required" value="<?php echo isset($user) ? htmlspecialchars($user->name) : ''; ?>" autofocus="autofocus" />
 		</label>
		<label for="name">Last Name
			<input id=Slname class="inputBox" name="lname" type="text" required="required" value="<?php echo isset($user) ? htmlspecialchars($user->name) : ''; ?>" autofocus="autofocus" />
 		</label>
 		<label for=userName>User Name
 			<input id=signupUserName class="inputBox" name="userName" type=text required=required /> 
 		</label>
		<label for="email">email address
			<input id=signupEmail class="inputBox" name="email" required="required" type="email" value="<?php echo isset($user) ? htmlspecialchars($user->email) : ''; ?>" />
		</label>
		<label for="password">Password
			<input id=Spass type="password" class="inputBox" name="password" required="required" pattern=".{5,}" title="minimum 5 characters" />
 		</label>
		<button class="signupBtton">Sign Up</button>
		<a href="#" id="exit" class="exitlogin">X</a>
	</form>
	</div>
</div>

<script>

var signupUNameBad = true;
var signupEmailBad = true;

// sign up button selected
$("#signup").submit(function(e) { 
	e.preventDefault();
	if (signupUNameBad == true){
		alert("The User Name Selected is already in use, Please choose a different User Name");
		return;
	}
	if (signupEmailBad == true) {
		alert("The Email is already in use on the system, Please choose a different email")
		return;
	}
	else
	// add person to DB
	$.ajax({
		url: 'enterUserBasic.php',
		type: 'post',
		dataType: 'text',
		async: 'false',
		data: "fname=" + $("#Sfname").val() + "&lname="+ $("#Slname").val() + "&pass=" + $("#Spass").val() + "&uName=" + $("#signupUserName").val() + "&email=" + $("#signupEmail").val(),	
		success: function (data) { 
			// if data = true then the user was added, false the user was declined for some reason
			if (data == "true") {

			// go to profile page 
				alert("make a profile page");
				
			}
			else if (data == "false"){
				alert("database error, please try again");
			}
		},
		error: function (data) {
			alert("Some kind of error occured in login, please try again");
		}
	});
	
});

//check userName on out focus
$("#signupUserName").focusout(function(e){
	e.preventDefault();
	// ajax call to process name check
	$.ajax({
		url: 'checkUName.php',
		type: 'post',
		dataType: 'text',
		async: 'false',
		data: "name=" + $("#signupUserName").val(),
		success: function (data) { 
			// if data = true then the username is taken if data=false then the user name is good
			if (data == "true") {
				$("#signupUserName").addClass("errorInBox");
				signupUNameBad = true;
			}
			else if (data == "false"){
				$("#signupUserName").removeClass("errorInBox");
				signupUNameBad = false;
			}
		},
		error: function (data) {
			alert("Some kind of error occured in login, please try again");
		}
	});
//e.preventDefault();
});

//check email in system on out focus
$("#signupEmail").focusout(function(e){
	e.preventDefault();
	// ajax call to process name check
	$.ajax({
		url: 'checkEmail.php',
		type: 'post',
		dataType: 'text',
		async: 'false',
		data: "name=" + $("#signupEmail").val(),
		success: function (data) { 
			// if data = true then the username is taken if data=false then the user name is good
			if (data == "true") {
				$("#signupEmail").addClass("errorInBox");
				signupEmailBad = true;
			}
			else if (data == "false"){
				$("#signupEmail").removeClass("errorInBox");
				signupEmailBad = false;
			}
		},
		error: function (data) {
			alert("Some kind of error occured in login, please try again");
		}
	});
//e.preventDefault();
});

// make window visible on signup button click 
$("#signBtn").click(function(){
	$("#signup").css('visibility','visible')
});
 

//cancel button click
$("#exit").click(function(){
	$("#signup").css('visibility','hidden')
});

</script>