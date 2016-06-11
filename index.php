<!-- Here is some changes I made Chad for the purpose of MVC Tutorial I found online -->
<?php
// tutorial link: http://phpocean.com/tutorials/back-end/how-to-start-your-own-php-mvc-framework-in-4-steps/28
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

if ($url == '/')
{

	// This is the home page
	// Initiate the home controller
	// and render the home view

	require_once __DIR__.'/Models/index_model.php';
	require_once __DIR__.'/Controllers/index_controller.php';
	require_once __DIR__.'/Views/index_view.php';

	$indexModel = New IndexModel();
	$indexController = New IndexController($indexModel);
	$indexView = New IndexView($indexController, $indexModel);

	print $indexView->index();

	}
	else
	{
	// This is not home page
	// Initiate the appropriate controller
	// and render the required view

	//The first element should be a controller
	$requestedController = $url[0];

	// If a second part is added in the URI,
	// it should be a method
	$requestedAction = isset($url[1])? $url[1] :'';

	// The remain parts are considered as
	// arguments of the method
	$requestedParams = array_slice($url, 2);

	// Check if controller exists. NB:
	// You have to do that for the model and the view too
	$ctrlPath = __DIR__.'/Controllers/'.$requestedController.'_controller.php';



	if (file_exists($ctrlPath))
	{

		require_once __DIR__.'/Models/'.$requestedController.'_model.php';
		require_once __DIR__.'/Controllers/'.$requestedController.'_controller.php';
		require_once __DIR__.'/Views/'.$requestedController.'_view.php';

		$modelName      = ucfirst($requestedController).'Model';
		$controllerName = ucfirst($requestedController).'Controller';
		$viewName       = ucfirst($requestedController).'View';

		$controllerObj  = new $controllerName( new $modelName );
		$viewObj        = new $viewName( $controllerObj, new $modelName );


		// If there is a method - Second parameter
		if ($requestedAction != '')
		{
			// then we call the method via the view
			// dynamic call of the view
			print $viewObj->$requestedAction($requestedParams);

		}

	}else{

		header('HTTP/1.1 404 Not Found');
		die('404 - The file - '.$ctrlPath.' - not found');
		//require the 404 controller and initiate it
		//Display its view
	}
}
?>

<!-- End of my changes  -->


<?php
// Initialization
require_once('includes/init.php');
// Add Header
$title = "BizRealty";
include("includes/header.inc.php");
?>

<body>
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
	<ul class="orbit-container">
		<button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
		<button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
		<li class="orbit-slide is-active">
			<img src="http://placehold.it/2000x750&text=1st">
		</li>
		<li class="orbit-slide">
			<img src="http://placehold.it/2000x750&text=2nd">
		</li>
		<li class="orbit-slide">
			<img src="http://placehold.it/2000x750&text=3nd">
		</li>
		<li class="orbit-slide">
			<img src="http://placehold.it/2000x750&text=4nd">
		</li>
	</ul>
</div>
<hr />

<div class="row column text-center">
		<h2>New Properties</h2>
<div class="column">
	<div class="row">
		<div class="medium-2 columns">
			<div class="media-object">
					<div class="media-object-section">
						<img class="thumbnail" src="http://placehold.it/100x100">
					</div><br />
					<div class="media-object-section">
						<h5>Product 3</h5>
						<p>Description 3</p>
					</div>
			</div>
			<div class="media-object">
					<div class="media-object-section">
						<img class="thumbnail" src="http://placehold.it/100x100">
					</div><br />
					<div class="media-object-section">
						<h5>Product 3</h5>
						<p>Description 3</p>
					</div>
			</div>
			<div class="media-object">
					<div class="media-object-section">
						<img class="thumbnail" src="http://placehold.it/100x100">
					</div><br />
					<div class="media-object-section">
						<h5>Product 3</h5>
						<p>Description 3</p>
					</div>
			</div>
			<div class="media-object">
					<div class="media-object-section">
						<img class="thumbnail" src="http://placehold.it/100x100">
					</div><br />
					<div class="media-object-section">
						<h5>Product 3</h5>
						<p>Description 3</p>
					</div>
			</div>
		</div>
	</div> 
</div>

<script>
      $(document).foundation();
</script>

<hr>
</body>

<?php 

include("includes/LoginWindow.inc.php"); 
include("includes/SignupWindow.inc.php");
include("includes/footer.php");

?> 











