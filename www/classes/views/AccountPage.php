<?php

class AccountPage extends Page {

	// Properties
	private $confirmPasswordErrors;
	private $oldPasswordErrors;
	private $newPasswordErrors;


	public function contentHTML() {

		// Make sure the user is logged in
		// If not then offer them a login or registration link
		if ( !isset($_SESSION['username']) ) {
			echo 'You need to log in';
			return;
		}

		include 'templates/accountpage.php';

		// If user is admin
		if( $_SESSION['privilege'] == 'admin' ){
			include 'templates/admincontrols.php';
		}
		
	}

	public function __construct($model) {

		// Use the parents constructer
		parent:: __construct($model);

		// If the password form has been submitted
		if( isset( $_POST['update-account'] ) ) {

			$this->comparePassword();

		}

	}

	public function comparePassword() {

		// Get the passwords used
		$oldPass = $_POST['old-password'];
		$newPass = $_POST['new-password'];
		$confirmPass = $_POST['confirm-password'];

		// Get who the user is
		$username = $_SESSION['username'];

		$this->dbc = new mysqli('localhost', 'root', '', 'cheapo');

		// Filter the data
		$username = $this->dbc->real_escape_string( $username );

		// Prepare the SQL to find a user and get the hashed password
		$sql = "SELECT Password FROM accounts WHERE Username = '$username'   ";

		// Run the sql
		$result = $this->dbc->query( $sql );

		// Make sure there is a result
		if( $result->num_rows == 0 ) {
			return;
		}

		// Extract the data from the result
		$data = $result->fetch_assoc();

		// Use the password compat library
		require 'vendor/password.php';


		// Compare passwords
		if ( $confirmPass == '' ) {
			$this->confirmPasswordErrors = 'You must enter a password';
		} 

		if ( $oldPass == '' ) {
			$this->oldPasswordErrors = 'You need to enter your current password';
		} elseif ( $newPass == $oldPass) {
			$this->oldPasswordErrors = 'Your new password can not be the same as your old password';
		} elseif ( !password_verify( $oldPass, $data['Password'] ) ) {
			$this->oldPasswordErrors = 'The old password you entered was incorrect';
		}

		if ( $newPass == '' ) {
			$this->newPasswordErrors = 'You must enter a new password';
		} elseif ( strlen($newPass) < 8 ) {
			$this->newPasswordErrors = 'Your new password must be at least 8 characters long';
		} elseif ( $newPass != $confirmPass ) {
			$this->newPasswordErrors = 'You did not confirm the same password';
		}

		if ( $this->confirmPasswordErrors == '' && $this->oldPasswordErrors == '' && $this->newPasswordErrors == '') {

			$this->model->changePassword($oldPass, $newPass);

			// Redirect the user
			header('Location: index.php?page=account');
		}

	}

}