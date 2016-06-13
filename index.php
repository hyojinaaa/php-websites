<?php 

// Make everthing in the vendor folder available to use
require 'vendor/autoload.php';



// Load appropriate page

// Has the user requested a page?
if( isset($_GET['page']) ) {

	// Requested page
	$page = $_GET['page'];

} else {

	// Home page
	$page = 'landing';

}

// Load the appropriate file based on page
switch($page) {

	case 'landing':
	case 'register':
		require 'app/controllers/LandingController.php';
		$controller = new LandingController();
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

	// Contact page
	case 'stream':
		echo $plates->render('stream');
	break;

	default:
		echo $plates->render('error404');
	break;
}

$controller->buildHTML();