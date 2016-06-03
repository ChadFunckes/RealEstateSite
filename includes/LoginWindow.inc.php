
<!-- Login box section -->
<div id=login>
	<div id=loginBox>
		<form id="LoginForm">
		<p class=bigGrey >Login</p>
		<label for=name>UserName</label><br>
		<input class="inputBox" type=text id='userName'/><br>
		<label for=pwd>Password</label><br>
		<input class="inputBox" type=password id='pwd'/><br><br>
			<table>
				<tr><td id=loginNow class=loginBtn>Login</td>
				<td></td>
				<td id=signUp class=loginBtn>Sign Up</td>
				<td></td>
				<td id=cancel class=loginBtn>Cancel</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<!-- End Login Box Section -->

<script>
$(document).ready(
//login Button click
$("#loginNow").click(function(){

	var userName = $("#userName").val();
	var password = $("#pwd").val();

	var datastring = "name="+userName+"&password="+password;

// ajax call to process login data
	$.ajax({
		url: 'login.php',
		type: 'post',
		data: datastring,
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
				$("#login").css('visibility','hidden');
				// var contains all JSON data for login in user
				var UserData = $.parseJSON(data);

				/// @TODO add persons Name
				$('#UsersNameBox').text("Welcome " + UserData.first + " " + UserData.last);
				
				// change login to logout
				$('#loginBtn').text(function(i, oldText) {
			        return oldText === 'Login' ? 'Logout' : oldText;
			    });
							
			}

		},
		error: function (data) {
			alert("Some kind of error occured in login, please try again");
		}
		});
	
}));

// sign up button click
$("#signUp").click(function(){});

//cancel button click
$("#cancel").click(function(){
	$("#login").css('visibility','hidden')
});

</script>