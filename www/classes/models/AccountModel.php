<?php

class AccountModel extends Model {

	public function getAllUsernames() {

		return $this->dbc->query(" SELECT Username FROM accounts");

	}

	public function changePassword($oldPass, $newPass) {

		$username = $_SESSION['username'];
		$password = $_POST['password'];

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

		// Hash the password
		require 'vendor/password.php';

		$newHashedPassword = password_hash($newPass, PASSWORD_BCRYPT);

		if (password_verify( $password, $data['Password'] ) ) {

			

		}



}