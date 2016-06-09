<head>
	<?php echo '<title>' . $title . '</title>'; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" type="text/css" href="css/foundation.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	

	<script type="text/javascript" src="js/myjs/js/app.js"></script>
	<script type="text/javascript" src="js/myjs/js/vendor/foundation.js"></script>
    
    <!--  these were loaded from diff locations ...
    
    <script type="text/javascript" src="js/myjs/js/vendor/jquery.js"></script>	
    <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    

    -->
    
	<script type="text/javascript" src="js/myjs/js/vendor/what-input.js"></script>	
	<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
 
	 
</head>
<style>
  .menu > li > a {
    display: block;
    padding: 0.5rem 1rem;
    line-height: 1;
 
    }
  .menu > li > p {
    display: block;
    padding: 0.5rem 1rem;
    line-height: 1;
    font:menu;
    }
   .top-bar .button.alert 
    	{
		width: 70px;
		font-size:small;
		padding: 12px;
		margin-top: 0;
		margin-left: 0;
		margin-right: 0;
	}

    @media only screen and (max-width: 350px) 
    {
   	.top-bar input 
   		{
	    max-width: 80px;
    	}
    .top-bar .button.alert 
    	{
		width: 70px;
		font-size:small;
		padding: 12px;
		margin-top: 0;
		margin-left: 0;
		margin-right: 0;
		}
	.top-bar 
		{
		height: 100px;
		}
    }


</style>
<div class="top-bar">
	<div class="top-bar-left">
			<ul class="menu">
				<li class="menu-text">BizRealty</li>
				<li><input style="width:355px" type="text" placeholder="Search"></li>
				<li><a href="#" class="alert button expand">Search</a></li>
			</ul>
	</div>
	<div class="top-bar-right">
		<ul class="menu">
			<li><p id="loginBtn" class = button>Login</p></li>
			<li><p id ="UsersNameBox"></p></li>
		</ul>
	</div>
</div>