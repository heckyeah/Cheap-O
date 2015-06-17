<?php

class Model {

	// Properties
	protected $dbc;
	public $title;
	public $description;

	// Constructor
	public function __construct() {

		// Connect to the dayabase and save the connection in the property above
		$this->dbc = new mysqli('localhost', 'root', '', 'cheapo');

	}
	
	// Methods (functions)
	public function getPageInfo() {

		// Obtain the name of the requested page
		$requestedPage = $_GET['page'];

		// Prepare the entry
		$sql = "SELECT Title, Description FROM pages WHERE Name = '$requestedPage'   ";

		// Run the query
		$result = $this->dbc->query ( $sql );

		// Make sure there is data in the result
		// If not then we need to get the 404 data instead
		if( $result->num_rows == 0 ) {

			// Prepare SQL to get the 404 page data
			$sql = "SELECT Title, Description FROM pages WHERE Name = '404'   ";

			// Run the query
			$result = $this->dbc->query( $sql );

		}

		// Convert the result into an associative array
		$pageData = $result->fetch_assoc();

		// Save the title and description in the properties above
		$this->title 		= $pageData['Title'];
		$this->description 	= $pageData['Description'];
	}

}