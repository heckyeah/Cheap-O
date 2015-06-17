<?php

class Page {

	// Properties
	public $title;
	public $description;
	public $model;

	// Constructor
	public function __construct($model) {
		$this->model = $model;

		// Get page data
		$this->model->getPageinfo();

	}

	// Function to build the HTML
	public function buildHTML() {

		// Header
		include 'templates/header.php';

		// Content
		$this->contentHTML();

		// Footer
		include 'templates/footer.php';

	}

}