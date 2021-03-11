<div class="container-fluid">
	<div id="listUser" class="row">
	<?= form_open('UserController/update','class="col-12"'); ?>

	<div class="text-center col-12">
		<p><?= $user->getLastname(); ?></p>
		<p><?= $user->getFirstname(); ?></p>
		<p><?= $user->getMail(); ?></p>
		<p><?= $user->getPhone(); ?></p>
		<p><?= $user->getCity(); ?></p>
		<p><?= $user->getPostal(); ?></p>
		<p><?= $user->getAddress(); ?></p>
		<p><?= $user->getDrivingLicense(); ?></p>
		<p><?= $user->getDrivingLicenseObtainDate() ?></p>
	</div>


		<div class="form-group text-center" id="formUser">
			<label>Changer d'email :</label>
				<input type="email" class="form-control" id="mail" name="mail" value="<?php if(isset($user)) echo $user->getMail() ?>">
			<span class="help-block"><?= form_error('mail') ?></span>

			<label class="col-12">Changer votre numéro téléphone :</label>
				<input type="text" class="form-control" id="phone" name="phone" value="<?php if(isset($user)) echo $user->getPhone() ?>">
			<span class="help-block"><?= form_error('phone') ?></span>

			<label class="col-12">Changer votre Ville :</label>
				<input type="text" class="form-control" id="city" name="city" value="<?php if(isset($user)) echo $user->getCity() ?>">
			<span class="help-block"><?= form_error('city') ?></span>

			<label class="col-12">Changer votre code postal :</label>
				<input type="text" class="form-control" id="postal" name="postal" value="<?php if(isset($user)) echo $user->getPostal() ?>">
			<span class="help-block"><?= form_error('postal') ?></span>

			<label class="col-12">Changer votre adresse :</label>
				<input type="text" class="form-control" id="address" name="address" value="<?php if(isset($user)) echo $user->getAddress() ?>">
			<span class="help-block"><?= form_error('address') ?></span>

			<label class="col-12">Changer votre numéro de permis de conduire :</label>
				<input type="text" class="form-control" id="drivingLicense" name="drivingLicense" value="<?php if(isset($user)) echo $user->getDrivingLicense() ?>">
			<span class="help-block"><?= form_error('drivingLicense') ?></span>

			<label class="col-12">Changer votre date d'obtention de votre permis de conduire :</label>
				<input type="date" class="form-control" id="drivingLicenseObtainDate" name="drivingLicenseObtainDate" value="<?php if(isset($user)) echo $user->getDrivingLicenseObtainDate() ?>">
			<span class="help-block"><?= form_error('drivingLicenseObtainDate') ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitUserOption']); ?>
	<?= form_close() ?>
			<div class="text-center">
				<?= anchor("UserController/updatePassword", "Changer de mot de passe ?",['class' => 'btn btn-warning', 'id' => 'redirectUpdatePassword']); ?>
			</div>
		</div>
	</div>

</div>