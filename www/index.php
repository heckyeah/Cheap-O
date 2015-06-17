<?php

// Start the session
session_start();

// Determine what page the user wants
$_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 'home';

// Require the page class
require 'classes/Page.php';

// Requite the Model class
require 'classes/models/Model.php';

// Switch based on requested page
switch( $_GET['page'] ) {

	// Home
	case 'home':
		require 'classes/models/HomeModel.php';
		require 'classes/HomePage.php';
		$model = new HomeModel();
		$page = new HomePage( $model );
	break;

	case 'about':
		require 'classes/models/AboutModel.php';
		require 'classes/views/AboutPage.php';
		$model = new AboutModel();
		$page = new AboutPage( $model );
	break;

	case 'contact':
		require 'classes/models/ContactModel.php';
		require 'classes/views/ContactPage.php';
		$model = new ContactModel();
		$page = new ContactPage( $model );
	break;
	case 'register':
		require 'classes/models/RegisterModel.php';
		require 'classes/views/RegisterPage.php';
		$model = new RegisterModel();
		$page = new RegisterPage( $model );
	break;

	case 'account':
		require 'classes/models/AccountModel.php';
		require 'classes/views/AccountPage.php';
		$model = new AccountModel();
		$page = new AccountPage( $model );
	break;

	case 'logout':
		require 'classes/models/LogoutModel.php';
		require 'classes/views/LogoutPage.php';
		$model = new LogoutModel();
		$page = new LogoutPage( $model );
	break;

	case 'login':
		require 'classes/models/LoginModel.php';
		require 'classes/views/LoginPage.php';
		$model = new LoginModel();
		$page = new LoginPage( $model );
	break;

	// 404
	default:
		require 'classes/Error404Page.php';
		require 'classes/models/Error404Model.php';
		$model = new Error404Model();
		$page = new Error404Page( $model );
	break;
}

// Load the content
$page->buildHTML();