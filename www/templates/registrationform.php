<div class="row">
	<div class="columns">
		<form novalidate action="index.php?page=register" method="POST">
			<h1>Registration Form</h1>

			<div>
				<label for="username">Username</label>
				<input type="text" id="username" name="username" placeholder="Username" value="<?php echo $this->username; ?>">
				<?php

					function errorMessage($message) {
						if( $message != '' ) {
							echo '<small class="error">';
							echo $message;
							echo '</small>';
						}
					}
					errorMessage($this->usernameError);

				?>
			</div>

			<div>
				<label for="email">E-mail Address</label>
				<input type="email" id="email" name="email" placeholder="example@mail.com" value="<?php echo $this->email; ?>">
				<?php errorMessage($this->emailError); ?>
			</div>

			<div>
				<label for="password1">Password</label>
				<input type="password" id="password1" name="password1">
			</div>

			<div>
				<label for="password2">Confirm Password</label>
				<input type="password" id="password2" name="password2" >
				<?php errorMessage($this->passwordError); ?>
				<input type="submit" value="Register Account" name="register-account" class="button tiny">
			</div>



		</form>
	</div>
</div>