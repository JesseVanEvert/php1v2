<?php
    require APPROOT . '/ui/inc/header.php';
?>

<?php
	require APPROOT . '/ui/inc/navigation.php';
?>
	<section id="content">
		<h1 class="center" id="loginHeader">
			Register
		</h1>

		<svg id="line">
			<line class="line" x1="0" y1="0" x2="60" y2="0" style="stroke:rgb(0,0,0);stroke-width:2" />
			Sorry, your browser does not support inline SVG.
		</svg>

		<br>

		<form action="register" class="cleanForm" method="POST">
			<fieldset id="input">
				<div id="gender">
					<label class="inputHeader">
						Gender *
					</label> <br><br>

					<label>
						<input type="radio" name="gender" value="male" checked class="radio-payment">
						Male
					</label>

					<label>
						<input type="radio" name="gender" value="female" class="radio-payment">
						Female
					</label>
				</div> <br>

				<label class="inputHeader">
					First name *
					<input type="text" name="name" <?php echo (!empty($data['nameError'])) ? 'is-invalid' : ''; ?> value="">
					<span class="invalidFeedback"> <?php echo $data['nameError'] ?> </span>
				</label>

				<label class="inputHeader">
					Last name *
					<input type="text" name="lastName" <?php echo (!empty($data['lastNameError'])) ? 'is-invalid' : ''; ?> value="">
					<span class="invalidFeedback"><?php echo $data['lastNameError'] ?></span>
				</label>

				<label class="inputHeader">
					E-email *
					<input type="email" name="email" <?php echo (!empty($data['emailError'])) ? 'is-invalid' : ''; ?> value="">
					<span class="invalidFeedback"><?php echo $data['emailError'] ?></span>
				</label>

				<label class="inputHeader">
					Phone number *
					<input type="text" name="phone" <?php echo (!empty($data['phoneError'])) ? 'is-invalid' : ''; ?> value="">
					<span class="invalidFeedback"><?php echo $data['phoneError'] ?></span>
				</label>

				<label class="inputHeader">
					Street *
					<input class="streetInput" type="text" name="street" <?php echo (!empty($data['streetError'])) ? 'is-invalid' : ''; ?> value="">
					<span class="invalidFeedback"><?php echo $data['streetError'] ?></span>
				</label>

				<label class="inputHeader">
					House Number *
					<input id="houseInput" type="number" name="house" <?php echo (!empty($data['houseError'])) ? 'is-invalid' : ''; ?> value="">
					<span class="invalidFeedback"><?php echo $data['houseError'] ?></span>
				</label>

				<label class="inputHeader">
					Password *
					<input type="password" name="password" <?php echo (!empty($data['passwordError'])) ? 'is-invalid' : ''; ?> value="">
					<span class="invalidFeedback"><?php echo $data['passwordError'] ?></span>
				</label>

				<label class="inputHeader">
					Confirm password *
					<input type="password" name="passwordConfirm" <?php echo (!empty($data['passwordConfirmError'])) ? 'is-invalid' : ''; ?> value="">
					<span class="invalidFeedback"><?php echo $data['passwordConfirmError'] ?></span>
				</label>

				<label>
					* required
				</label>

			</fieldset>

			<br>

			<input id="submit" type="submit" value="Register">
		</form>
	</section>
</div>
<?php
    require APPROOT . '/ui/inc/footer.php';
?>
