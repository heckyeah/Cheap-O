<?php

class RegisterPage extends Page {

	// Properties
	private $usernameError;
	private $username;
	private $emailError;
	private $email;
	private $passwordError;

	public function contentHTML() {

		include 'templates/registrationform.php';

	}

	public function __construct($model) {

		// Use the parents constructer
		parent:: __construct($model);

		// If the registration form has been submitted
		if( isset( $_POST['register-account'] ) ) {

			$this->processNewAccount();

		}

	}

	public function processNewAccount() {

		// Make life easier
		$username = trim( $_POST['username'] );
		$email = trim( $_POST['email'] );
		$pass1 = $_POST['password1'];
		$pass2 = $_POST['password2'];

		// Save the data for use later
		$this->username = $username;
		$this->email = $email;

		// Validate the username
		if ( strlen($username) > 20 || strlen($username) < 3 ) {
			$this->usernameError = 'Username must be at least 3 charaters and at most 20';
		} elseif ( !preg_match( '/^[a-zA-z0-9_\-.]{3,20}$/', $username ) ) {
			$this->usernameError = 'Use only alphanumeric, numbers, hyphens, underscores and periods (-_.)';
		} elseif ( $this->model->checkUserNameExists( $username )  ) {
			$this->usernameError = 'Username already exists';
		}

		// Validate E-Mail
		if ( strlen($email) < 6 || strlen($email) > 254 ) {
			$this->emailError = 'E-Mail is an invalid length';
		} elseif( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$this->emailError = 'Invalid email format. example@mail.com';
		} elseif ( $this->model->checkEmailExists( $email ) ) {
			$this->emailError = 'E-Mail already in use';
		}

		//Validate Password
		if ( strlen($pass1) < 8 ) {
			$this->passwordError = 'Password must be at least 8 charaters long';
		} elseif ( $pass1 != $pass2 ) {
			$this->passwordError = 'Password is not the same';
		}

		// If there are no errors register account
		if( $this->usernameError == '' && $this->emailError == '' && $this->passwordError == '' ) {
			
			$this->model->registerNewAccounts($username, $email, $pass1 );
			
			// Redirect the user
			header('Location: index.php?page=account');
		}

	}
}