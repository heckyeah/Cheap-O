<?php

class RegisterModel extends Model {

	public function checkUsernameExists( $username ) {

		// Filter the username just in case it has malicious code
		$username = $this->dbc->real_escape_string( $username );

		// Prepare SQL
		$sql = "SELECT Username FROM accounts WHERE Username = '$username'";

		// Run query
		$result = $this->dbc->query( $sql );

		// If there is a result
		if ( $result->num_rows ) {
			// Found a username that is the same
			return true;
		} else {
			// Didnt find the same username
			return false;
		}

	}

	public function checkEmailExists( $email ) {

		// Filter the email just in case it has malicious code
		$email = $this->dbc->real_escape_string( $email );

		// Prepare SQL
		$sql = "SELECT email FROM accounts WHERE email = '$email'";

		// Run query
		$result = $this->dbc->query( $sql );

		// If there is a result
		return $result->num_rows ? true : false;

	}

	public function registerNewAccounts ($username, $email, $password ) {

		$username 	= $this->dbc->real_escape_string( $username );
		$email 		= $this->dbc->real_escape_string( $email );

		// Hash the password
		require 'vendor/password.php';

		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

		// Prepare SQL
		$sql = "INSERT INTO accounts 
				VALUES (NULL, '$username', '$email', '$hashedPassword', CURRENT_TIMESTAMP, 'user')";

		// Run the sql
		$this->dbc->query($sql);

		// Log the user in by saving their details into the session
		$_SESSION['username'] = $username;
		$_SESSION['privilege'] = 'user';

	}

}