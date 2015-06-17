<?php

class LoginModel extends Model {

	public function attemptLogin() {

		// Extract the data from the POST array
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Filter the data
		$username = $this->dbc->real_escape_string( $username );

		// Prepare the SQL to find a user and get the hashed password
		$sql = "SELECT Password, Privilege FROM accounts WHERE Username = '$username'   ";

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

		// Compare the passwords
		if (password_verify( $password, $data['Password'] ) ) {

			// Credentials are correct
			$_SESSION['username'] = $username;
			$_SESSION['privilege'] = $data['Privilege'];

			// Redirect the user
			header('Location: index.php?page=account');

		}


	}

}