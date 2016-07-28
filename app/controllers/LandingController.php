<?php

class LandingController extends PageController {

	// Properties (attributes)
	private $emailMessage;
	private $passwordMessage;

	// Constructor
	public function __construct($dbc) {

		// Save this database connection for later
		$this->dbc = $dbc;

		$this->mustBeLoggedOut();


		// If the use has submitted the registration form
		if( isset($_POST['new-account']) ) {
			$this->validateResistrationForm();
		}
	}

	// Methods (functions)
	public function registerAccount() {

		// Validate the user's date

		// Check the datebase to see if E-Mail is in use

		// Check the strength of the password

		// Register the account OR show error messages

		// If successful, log user in and redirect to their brand new stream page (account)
	}

	public function buildHTML() {

		// Instantiate (create instance of) Plates library
		$plates = new League\Plates\Engine('app/templates');

		// Prepare a container for data
		$data = [];

		// If there is an E-mail error
		if($this->emailMessage != '') {
			$data['emailMessage'] = $this->emailMessage;
		}

		// If there is an password error
		if($this->passwordMessage != '') {
			$data['passwordMessage'] = $this->passwordMessage;
		}

		echo $plates->render('landing', $data);

	}

	private function validateResistrationForm() {

		$totalErrors = 0;
		
		// Make sure the E-mail has been provided and is valid
		if( $_POST['email'] == '' ) {
			// E-mail is invalid
			$this->emailMessage = 'Invalid E-mail';
			$totalErrors++;
		}

		// Make sure the E-Mail is not in use
		$filteredEmail = $this->dbc->real_escape_string( $_POST['email'] );

		$sql = "SELECT email
				FROM users
				WHERE email = '$filteredEmail'  ";

		// Run the query
		$result = $this->dbc->query($sql);

		// If the query failed OR there is a result
		if( !$result || $result->num_rows > 0 ) {
			$this->emailMessage = 'E-Mail in use';
			$totalErrors++;
		}

		// If password is less than 8 characters long
		if( strlen($_POST['password']) < 8 ) {
			// Password is too short
			$this->passwordMessage = 'Password must be at least 8 characters';
			$totalErrors++;
		}

		// Determine if this data is valid to go into the database
		if( $totalErrors == 0 ) {

			// Validation passed! :D
			
			// Store user's data
			// Filter user data before using it in a query
			

			// Hash the password
			$hash = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			// Prepare the SQL 
			$sql = "INSERT INTO users (email, password)
					VALUES ('$filteredEmail', '$hash')";

			// Run the query
			$this->dbc->query($sql);

			// Check to make sure this worked

			// Log the user in
			$_SESSION['id'] = $this->dbc->insert_id;
			$_SESSION['privilege'] = 'user';

			// Redirect the user to their stream page
			header('Location: index.php?page=stream');

		}
	}	
}






