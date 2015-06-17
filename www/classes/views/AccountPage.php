<?php

class AccountPage extends Page {

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

}