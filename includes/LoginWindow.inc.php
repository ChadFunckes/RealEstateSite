
<!-- Login box section -->
<div id=login>
	<div id=loginBox>
		<form id="LoginForm">
			<p class=biggrey >Login</p>
			<label for=name>Username:
				<input class="inputBox" type=text id='userName'/>
			</label>
			<label for=pwd style="width:70px">Password:
				<input class="inputBox" type=password id='pwd'/>
			</label>
			<a id="forgotPassBTN">Forget Password?</a>
			<a href="login.php" id="loginNow" class="loginBtn">Login</a>
			<a href="#" id="cancel" class="loginBtn">X</a>
		</form>
	</div>
</div>
<!-- End Login Box Section -->

<!-- Fogot password box -->
<div id="forgotPass" >
	<div id="forgotPassBox" >
			<h6 text-align = center >Please enter your email address:</h6>
 			<form id="passrec">
 				<input id=forgotPassEmailInput type="email" class="passrecovery" placeholder="Your email here...">
 				<input id=forgotPassBoxSubmit type="button" value="Submit">
 				<input id=forgotPassBoxCancel type="button" value = "Cancel">
 			</form>
	</div></div>
<!-- End forgot password box -->

<!-- after logging in, what will show in the header. --> 
<!--  Logout section  -->
	<form name=logout action="index.php" style="display:none;">
		<input type=text name=logout value=true>
	</form>
<!-- End logout Form -->


<script>
// outcome of logging in. 

var codeExistsFlag = false;

if (logIn == true)
	{
		$('#loginBtn').text("Logout"); 
		$('#UsersNameBox').text("Welcome " + <?php echo json_encode($_SESSION["firstName"] ." " . $_SESSION["lastName"]); ?>);
		$("#signBtn").css('visibility','hidden')
		$("#loginBtn").click(function()
		{		
			document.logout.submit();	
		});
	}
// outcome of login failure
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
//cancel button click
$("#cancel").click(function(){
	$("#login").css('visibility','hidden')
});
//forgot password click
$("#forgotPassBTN").click(function(){
	
	$("#login").css('visibility','hidden');
	$("#forgotPass").css('visibility','visible');

		//forgot passwod cancel hit
		$("#forgotPassBoxCancel").click(function(){
			$("#forgotPass").css('visibility','hidden');
			$("#login").css('visibility','visible');
		});
		
		//forgot password submit hit
		$("#forgotPassBoxSubmit").click(function(e){
			e.preventDefault();

			//check if email is in the system
			$.ajax({
				url: 'checkEmail.php',
				type: 'post',
				dataType: 'text',
				async: 'false',
				data: "name=" + $("#forgotPassEmailInput").val(),
				success: function (data) { 
					// if data = true then the email is taken if data=false then email does not exist
					// if data = error then temp code was already sent
					if (data == "false") {
						alert("That Email Does not exists in the system");
					}
					else if (data == "true"){
						//perform the temp code add
						$.ajax({
							url: 'passrecRun.php',
							type: 'post',
							dataType: 'text',
							async: 'false',
							data: "passrecovery="+$("#forgotPassEmailInput").val(),
							success: function (data){
								//alert(data);
								if (data == "error"){
									alert("shits in the system");
								}
							},
							error: function (data) {
								alert("Some kind of error occured in login, please try again");
							}
						});
					}
				},
				error: function (data) {
					alert("Some kind of error occured in login, please try again");
				}
			}); // end email check
		}); // end forget box submission func		
}); // end forgotpassword dialog functions
}// end of script if user is NOT logged in


</script>