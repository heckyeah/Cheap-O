<div class="row">
	<div class="columns medium-6">
		<h2>Password Reset</h1>
		<form novalidate action="index.php?page=account" method="post">
			<div>
				<label for="old-password">Old Password</label>
				<input type="password" id="old-password" name="old-password">

				<?php
					function errorMessage($message) {
						if( $message != '' ) : ?>
							<small class="error">
								<?php echo $message; ?>
							</small>
						<?php endif; 
					}
					errorMessage($this->oldPasswordErrors); ?>

			</div>

			<div>
				<label for="new-password">New Password</label>
				<input type="password" id="new-password" name="new-password" >
				<?php errorMessage($this->newPasswordErrors); ?>
			</div>

			<div>
				<label for="confirm-password">Confirm Password</label>
				<input type="password" id="confirm-password" name="confirm-password" >
				<?php errorMessage($this->confirmPasswordErrors); ?>

				<input type="submit" value="Update Password" name="update-account" class="button tiny">
			</div>
		</form>
	</div>
</div>