<?php 

if(isset($_GET['logout']) && $_GET['logout'] == true){
	session_unset();
	$_SESSION["firstName"] = "no";
	$_SESSION["lastName"] = "user";
}

if ($_SESSION["firstName"] == "no"){
	echo "<script> var logIn = false; </script>";
}
else echo "<script> var logIn = true; </script>";

?>


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

<!--  Logout section  -->
<form name=logout action="index.php" style="display:none;">
<input type=text name=logout value=true>
</form>
<!-- End logout Form -->


<script>

if (logIn == true){

	$('#loginBtn').text("Logout"); 
	$('#UsersNameBox').text("Welcome " + <?php echo json_encode($_SESSION["firstName"] ." " . $_SESSION["lastName"]); ?>);

	$("#loginBtn").click(function(){		
		document.logout.submit();	
	});

}

if (logIn == false){

	$("#loginBtn").click(function(){
		$("#login").css('visibility','visible');
	});

	$("#loginNow").click(function(e){
		e.preventDefault();
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
				window.location.href = "index.php";			
			}

		},
		error: function (data) {
			alert("Some kind of error occured in login, please try again");
		}
	});
	e.preventDefault();
});

// sign up button click
$("#signUp").click(function(){});

//cancel button click
$("#cancel").click(function(){
	$("#login").css('visibility','hidden')
});
}

</script>