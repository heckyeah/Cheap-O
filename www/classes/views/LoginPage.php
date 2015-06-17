<?php

class LoginPage extends Page {

	// Properties

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

		// Use the model to check if the user has the right credentials
		$this->model->attemptLogin();

		
		
	}


}