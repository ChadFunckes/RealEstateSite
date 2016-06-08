<!-- Login box section -->
<div id=login>
	<div id=loginBox>
		<form id="LoginForm">
			<p class=biggrey >Login</p>
			<label for=name>Username:
				<input class="inputBox" type=text id='userName'/>
			</label><br><br>
			<label for=pwd style="width:70px">Password:
				<input class="inputBox" type=password id='pwd'/>
			</label><br><br>
			
			<a href="login.php" id="loginNow" class="loginBtn">Login</a>
			<a href="signup.php" id="signUp" class="loginBtn">Sign Up</a>
			<a href="#" id="cancel" class="loginBtn">X</a>
		</form>
	</div>
</div>
<!-- End Login Box Section -->

<script>
$(document).ready(
// On login Button click
$("#loginNow").click(function(){

	// ajax call to process login data
	$.ajax({
		url: 'login.php',
		type: 'post',
		dataType: 'text',
		async: 'false',
		data: "name="+$("#userName").val()+"&password="+$("#pwd").val(),
		success: function (data) { 

			if (data == "error"){
				//Process error
				$("#loginBox").animate({left: '32%'});
				$("#loginBox").animate({left: '28%'});
				$("#loginBox").animate({left: '31%'});
				$("#loginBox").animate({left: '29%'});
				$("#loginBox").animate({left: '30%'});
			}
			else {
				// hide login window
				$("#login").css('visibility','hidden');
				// parse JSON data for login in user
				var UserData = $.parseJSON(data);

				// Puts persons name at the top
				$('#UsersNameBox').text("Welcome " + UserData.first + " " + UserData.last);
				
				// change login to logout
				$('#loginBtn').text(function(i, oldText) {
			        return oldText === 'Login' ? 'Logout' : oldText;
			    });
			    // change click function *** if user login set do this....if not do that....etc...
				// setup cookie or session data for logged in user....			
			}

		},
		error: function (data) {
			alert("Some kind of error occured in login, please try again");
		}
		});
	return false;
}));

// sign up button click
$("#signUp").click(function(){});

//cancel button click
$("#cancel").click(function(){
	$("#login").css('visibility','hidden')
});

</script>