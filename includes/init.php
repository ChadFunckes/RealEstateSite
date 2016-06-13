<?php
// Register autoload function
spl_autoload_register('myAutoloader');

/**
 * Autoloader
 *
 * @param string $className  The name of the class
 * @return void
*/
function myAutoloader($className)
{
	require dirname(dirname(__FILE__)) . '/classes/' . $className . '.class.php';
	
}

// <!--Here is some changes I made Chad for the purpose of MVC Tutorial I found online -->
// tutorial link: http://phpocean.com/tutorials/back-end/how-to-start-your-own-php-mvc-framework-in-4-steps/28
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

if ($url == '/')
{

	// This is the home page
	// Initiate the home controller
	// and render the home view

	require_once 'Models/index_model.php';
	require_once 'Controllers/index_controller.php';
	require_once 'Views/index_view.php';

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
//<!-- End of my changes  -->

// Start session
session_start();
if (!isset($_SESSION['firstName'])){
	
	$_SESSION["firstName"] = "no";
	$_SESSION["lastName"] = "user";
	
}