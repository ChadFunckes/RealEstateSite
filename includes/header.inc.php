
	<?php echo '<title>' . $title . '</title>'; 
	
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
<head>	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" type="text/css" href="css/foundation.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/myjs/js/app.js"></script>
	<script type="text/javascript" src="js/myjs/js/vendor/foundation.js"></script>  
	<script type="text/javascript" src="js/myjs/js/vendor/what-input.js"></script>	
	<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
 	 
</head>
<div id=mainMenu class="top-bar">
	<div class="top-bar-left">
			<ul class="menu">
				<li class="menu-text">BizRealty</li>
				<li><input style="width:355px" type="text" placeholder="Search"></li>
				<li><a href="#" class="alert button expand">Search</a></li>
			</ul>
	</div>
	<div class="top-bar-right">
		<ul class="menu">
			<li><p id="signBtn" class = button>Signup</p> <p id="loginBtn" class = button>Login</p> </li>
			<li><p id ="UsersNameBox"></p></li>
		</ul>
	</div>
</div>