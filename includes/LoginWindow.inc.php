
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

	var request; // ajax request variable
	var userName = $("#userName").val();
	var password = $("#pwd").val();

	var datastring = "name="+userName+"&password="+password;

	request = $.post('login.php', datastring, function(response){
				//alert("reponse" + response);
				$.cookie("UCR", response);
				
				alert($.cookie("UCR"));
	});

	
	
}));

// sign up button click
$("#signUp").click(function(){});

//cancel button click
$("#cancel").click(function(){
	$("#login").css('visibility','hidden')
});

</script>