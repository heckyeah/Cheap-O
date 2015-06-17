<?php

class AccountModel extends Model {

	public function getAllUsernames() {

		return $this->dbc->query(" SELECT Username FROM accounts");

	}

}