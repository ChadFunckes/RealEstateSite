<?php 
	if(!isset($_GET['firstName']) && !isset($_GET['lastName']))
	{
	
	}
?>
<!-- Signup box section -->

<div id=signup>
	<div id=signupBox>
	<h3>Signup Please</h3>
	<form id="signupForm">
		<label for="name">First Name
			<input class="fname" name="name" type="text" required" value="<?php echo isset($user) ? htmlspecialchars($user->name) : ''; ?>" autofocus="autofocus" />
 		</label>
		<label for="name">Last Name
			<input class="lname" name="name" type="text" required" value="<?php echo isset($user) ? htmlspecialchars($user->name) : ''; ?>" autofocus="autofocus" />
 		</label>
		<label for="email">email address
			<input class="emails" name="email" required="required" type="email" value="<?php echo isset($user) ? htmlspecialchars($user->email) : ''; ?>" />
		</label>
		<label for="password">Password
			<input type="password" class="pass" name="password" required="required" pattern=".{5,}" title="minimum 5 characters" />
 		</label>
		<button class="signupBtton">Sign Up</button>
		<a href="#" id="exit" class="exitlogin">X</a>
	</form>
	</div>
</div>

<script>
// outcome of logging in. 
$("#signup").css('visibility','hidden');
$("#signBtn").click(function(){
	$("#signup").css('visibility','visible')
});
 

//cancel button click
$("#exit").click(function(){
	$("#signup").css('visibility','hidden')
});

</script>