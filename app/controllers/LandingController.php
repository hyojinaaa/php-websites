<?php

class LandingController {

	// Properties (attributes)
	private $emailMessage;

	// Constructor
	public function __construct() {

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

		echo $plates->render('landing', $data);

	}

	private function validateResistrationForm() {
		
		// Make sure the E-mail has been provided and is valid
		if( $_POST['email'] == '' ) {
			// E-mail is invalid
			$this->emailMessage = 'Invalid E-mail';
		}

	}

}