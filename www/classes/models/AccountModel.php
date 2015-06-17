<?php

class AccountModel extends Model {

	public function getAllUsernames() {

		return $this->dbc->query(" SELECT Username FROM accounts");

	}

	public function changePassword($oldPass, $newPass) {

		$username = $_SESSION['username'];

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

		// Hash the password
		$newPass = password_hash($newPass, PASSWORD_BCRYPT);

		if (password_verify( $oldPass, $data['Password'] ) ) {

			$updatePassword = "UPDATE accounts
								SET Password ='$newPass'
								WHERE Username = '$username'   ";

			// Run the sql
			$this->dbc->query($updatePassword);	

		}

	}

}