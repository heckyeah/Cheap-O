<div class="row">
	<div class="columns">
		<form novalidate action="index.php?page=login" method="POST">
			<h1>Login</h1>
			<div class="medium-6 columns">
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
			<div class="medium-6 columns">
				<label for="password1">Password</label>
				<input type="password" id="password" name="password">
				<?php errorMessage($this->passwordError); ?>
			</div>
			<div class="medium-12 columns">
				<input type="submit" value="Login" name="login-account" class="button tiny">
				<?php errorMessage($this->loginError); ?>
			</div>
		</form>
	</div>
</div>