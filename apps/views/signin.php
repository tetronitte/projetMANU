<div class="container-fluid">

	<h3 class="text-center">INSCRIPTION</h3>

	<div id="listSignIn" class="row">

	<?= form_open('UserController/signin','class="col-12"'); ?>
		<?= validation_errors() ?>
		<div class="form-group text-center" id="formLogin">
			<div id="hrbar" class="col-12"></div>
			<h3>informations de base :</h3>

				<label>Nom :</label>
					<input type="text" class="form-control" id="firstname" name="firstname" value="<?php if(isset($profil)) echo $profil['firstname']?>">
				<span class="help-block"><?= form_error('firstname') ?></span>

				<label class="col-12">Prénom :</label>
					<input type="text" class="form-control" id="lastname" name="lastname" value="<?php if(isset($profil)) echo $profil['lastname']?>">
				<span class="help-block"><?= form_error('lastname') ?></span>

				<label class="col-12">Email :</label>
					<input type="text" class="form-control" id="email" name="mail" value="<?php if(isset($profil)) echo $profil['mail']?>">
				<span class="help-block"><?= form_error('mail') ?></span>

				<label class="col-12">Date de naissance :</label>
					<input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php if(isset($profil)) echo $profil['birthdate']?>">
				<span class="help-block"><?= form_error('birthdate') ?></span>

				<label class="col-12">Votre numéro de téléphone :</label>
					<input type="tel" class="form-control" id="phone" name="phone" value="<?php if(isset($profil)) echo $profil['phone']?>">
				<span class="help-block"><?= form_error('phone') ?></span>

				<label class="col-12">Votre ville :</label>
					<input type="text" class="form-control" id="city" name="city" value="<?php if(isset($user)) echo $user['city']?>">
				<span class="help-block"><?= form_error('city') ?></span>

				<label class="col-12">Votre code postal :</label>
					<input type="text" class="form-control" id="postal" name="postal" value="<?php if(isset($user)) echo $user['postal']?>">
				<span class="help-block"><?= form_error('postal') ?></span>

				<label class="col-12">Votre adresse :</label>
					<input type="text" class="form-control" id="address" name="address" value="<?php if(isset($user)) echo $user['address']?>">
				<span class="help-block"><?= form_error('address') ?></span>

				<label class="col-12">Mot de passe :</label>
					<input type="text" class="form-control" id="password" name="pwd" value="<?php if(isset($user)) echo $user['pwd']?>">
				<span class="help-block"><?= form_error('pwd') ?></span>

				<label class="col-12">Confirmer votre mot de passe :</label>
					<input type="text" class="form-control" id="confirmpassword" name="verifPwd" value="<?php if(isset($user)) echo $user['verifPwd']?>">
				<span class="help-block"><?= form_error('verifPwd') ?></span>

			<div id="hrbar" class="col-12"></div>
			<h3>informations supplémentaire :</h3>

				<label class="col-12">Votre numéro de permis :</label>
					<input type="text" class="form-control" id="drivinglicense" name="drivingLicense" value="<?php if(isset($user)) echo $user['drivingLicense']?>">
				<span class="help-block"><?= form_error('drivingLicense') ?></span>

				<label class="col-12">Date obtention du permis :</label>
					<input type="date" class="form-control" id="drivinglicenseObtainDate" name="drivingLicenseObtainDate" value="<?php if(isset($user)) echo $user['drivingLicenseObtainDate']?>">
				<span class="help-block"><?= form_error('drivingLicenseObtainDate') ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitSignIn']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>