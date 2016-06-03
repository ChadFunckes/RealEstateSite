<head>
<?php echo '<title>' . $title . '</title>'; ?>
<link rel="stylesheet" type="text/css" href="main.css">
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
</head>

<div id="header">
<h1>CRE Site</h1>

	<div id="topNav">
		<p id="loginBtn" class = button>Login</p>
		<p id ="UsersNameBox"></p>
	</div>

</div>

<script>

// Action on login Button Pressed
$("#loginBtn").click(function(){
	$("#login").css('visibility','visible');
});

</script>