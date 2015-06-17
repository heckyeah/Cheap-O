<?php

class LoginPage extends Page {

	// Properties
	private $usernameError;
	private $passwordError;
	private $loginError;
	private $username;

	public function __construct ( $model ) {

		parent:: __construct($model);

		// If the user has submitted the form
		if ( isset($_POST['username']) ) {
			
			// Process the login form
			$this->processLoginForm();
		}

	}

	public function contentHTML() {

		include 'templates/loginpage.php';

	}

	public function processLoginForm() {

		// Save the loginform data
		$this->username = trim($_POST['username']);

		// Validate 
		if( trim($_POST['username']) == '' ) {
			$this->usernameError = '*Required';
		}

		if( $_POST['password'] == '' ) {
			$this->passwordError = '*Required';
		}

		// If there are no errors
		if( $this->passwordError == '' && $this->usernameError == '' ) {
			// Use the model to check if the user has the right credentials
			$this->model->attemptLogin();

			// If this code runs then the user was not redirected
			// Therefore they did not have the correct login credentials
			$this->loginError = 'Username or password were incorrect';

		}
	}
}