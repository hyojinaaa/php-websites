<?php 

session_start();

// Make everthing in the vendor folder available to use
require 'vendor/autoload.php';



// Load appropriate page

// Has the user requested a page?
// if( isset($_GET['page']) ) {

// 	// Requested page
// 	$page = $_GET['page'];

// } else {

// 	// Home page
// 	$page = 'landing';

// }

$page = isset($_GET['page']) ? $_GET['page'] : 'landing';

// Connect to the database
$dbc = new mysqli('localhost', 'root', '', 'pinterest');

// Load the appropriate file based on page
switch($page) {

	case 'landing':
	case 'register':
		require 'app/controllers/LandingController.php';
		$controller = new LandingController($dbc);
	break;

	// About page
	case 'about':
		echo $plates->render('about');
	break;

	// Contact page
	case 'contact':
		echo $plates->render('contact');
	break;

	// Login page
	case 'login':
		echo $plates->render('login');
	break;

	// Stream page
	case 'stream':
		
	break;

	default:
		echo $plates->render('error404');
	break;
}

$controller->buildHTML();