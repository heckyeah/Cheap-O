<div class="row">
	<div class="columns">
		<form>
			<label>Users: </label>
			<select>
				<?php

					// Use the model to get all the accounts
					$result = $this->model->getAllUsernames();

					// Loop through the result and display all the users
					while( $row = $result->fetch_assoc() ) {
						echo '<option>'.$row['Username'].'</option>';
					}

				?>
			</select>
		</form>
	</div>
</div>

<?php include 'templates/accountinfopage.php'; ?>

