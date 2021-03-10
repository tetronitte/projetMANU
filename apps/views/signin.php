<div class="container-fluid">

	<h3 class="text-center">INSCRIPTION</h3>

	<div id="listSignIn" class="row">

	<?= form_open('url','class="col-12"'); ?>

		<div class="form-group text-center" id="formSignin">
			<div id="hrbar" class="col-12"></div>
			<h3>informations de base :</h3>

				<label>Nom :</label>
					<input type="text" class="form-control" id="firstname" name="firstname" value="<?php if(isset($config['firstname'])){ echo '';};?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Prénom :</label>
					<input type="text" class="form-control" id="lastname" name="lastname" value="<?php if(isset($config['lastname'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Email :</label>
					<input type="text" class="form-control" id="email" name="email" value="<?php if(isset($config['email'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Date de naissance :</label>
					<input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php if(isset($config['birthdate'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Votre numéro de téléphone :</label>
					<input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php if(isset($config['phone'])){ echo '';}?>"> <!-- utiliser le regex du tel -->
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Votre code postal :</label>
					<input type="text" class="form-control" id="city" name="city" value="<?php if(isset($config['city'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Votre adresse :</label>
					<input type="text" class="form-control" id="address" name="address" value="<?php if(isset($config['address'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Mot de passe :</label>
					<input type="text" class="form-control" id="password" name="password" value="<?php if(isset($config['password'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Confirmer votre mot de passe :</label>
					<input type="text" class="form-control" id="confirmpassword" name="confirmpassword" value="<?php if(isset($config['confirmpassword'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

			<div id="hrbar" class="col-12"></div>
			<h3>informations supplémentaire :</h3>

				<label class="col-12">Votre numéro de permis :</label>
					<input type="text" class="form-control" id="drivinglicense" name="drivinglicense" value="<?php if(isset($config['drivinglicense'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Date obtention du permis :</label>
					<input type="date" class="form-control" id="drivinglicenseObtainDate" name="drivinglicenseObtainDate" value="<?php if(isset($config['drivinglicenseObtainDate'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitSignIn']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>