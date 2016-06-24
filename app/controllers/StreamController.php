<?php 

class StreamController extends PageController {

	// Properties
	private $top5Favourites;

	// Constructor
	public function __construct($dbc) {

		// Run the parent constructor
		parent::__construct();

		$this->dbc = $dbc;

		// If you are not logged in
		if( !isset($_SESSION['id']) ) {
			// Redirect the user to the login page
			header('Location: index.php?page=login');
		}
	}

	// Methods (functions)
	public function buildHTML() {

		// Get latest posts (pins)
		$allData = $this->getLatestPosts();

		// Prepare an empty data array
		$data = [];

		$data['allPosts'] = $allData;

		// Send stream and data to the actual page
		echo $this->plates->render('stream', $data);

	}

	private function getLatestPosts() {

		// Prepare some SQL
		$sql = "SELECT *
				FROM posts";

		// Run the SQL and capture the result
		$result = $this->dbc->query($sql);

		// Extract the result as an array
		$allData = $result->fetch_all(MYSQLI_ASSOC);

		// Return the results to the code that called this function
		return $allData;
	}
}