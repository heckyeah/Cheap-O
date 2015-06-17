<?php

class AccountPage extends Page {

	// Properties
	private $generalPasswordErrors;
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

		// If the registration form has been submitted
		if( isset( $_POST['update-account'] ) ) {

			$this->changePassword();

		}

	}

	public function compareUsername() {

		// Get the passwords used
		$oldPass = $_POST['old-password'];
		$newPass = $_POST['new-password'];
		$confirmPass = $_POST['confirm-password'];

		// Compare passwords
		if ( $oldPass == '' || $newPass == '' || $confirmPass == '' ) {
			$generalPasswordErrors = 'You must enter a password';
		} 

		// Old password corrections
		if ( $oldPass !=  ) {
			$oldPasswordErrors = 'Your current password is incorrect';
		}

		if ( $newPass == '' ) {
			$newPasswordErrors = 'You cant make the new password the same as your old password';
		} elseif ( strlen($newPass) < 8 ) {
			$newPasswordErrors = 'Your new password must be at least 8 characters long';
		} elseif ( $newPass != $confirmPass ) {
			$newPasswordErrors = 'You did not confirm the same password';
		}

		if ( $generalPasswordErrors == '' && $oldPasswordErrors == '' && $newPasswordErrors == '') {

			$this->model->changePassword($oldPass, $newPass);

		}

	}

}