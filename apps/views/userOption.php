<div class="container-fluid">
	<div id="listUser" class="row">
	<?= form_open('url1','class="col-12"'); ?>

		<div class="form-group text-center" id="formUser">
			<label>Changer d'email :</label>
				<input type="email" class="form-control" id="mail" name="mailchange" value="<?php if(isset($config['mail'])){ echo '';};?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Changer le mot de passe :</label>
				<input type="text" class="form-control" id="pwd" name="pwd" value="<?php if(isset($config['pwd'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Confirmer le mot de passe :</label>
				<input type="text" class="form-control" id="pwd" name="pwd" value="<?php if(isset($config['pwd'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Changer votre numéro téléphone :</label>
				<input type="text" class="form-control" id="phone" name="phone" value="<?php if(isset($config['phone'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Changer votre Ville :</label>
				<input type="text" class="form-control" id="city" name="city" value="<?php if(isset($config['city'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Changer votre code postal :</label>
				<input type="text" class="form-control" id="postal" name="postal" value="<?php if(isset($config['postal'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Changer votre adresse :</label>
				<input type="text" class="form-control" id="address" name="address" value="<?php if(isset($config['address'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Changer votre numéro de permis de conduire :</label>
				<input type="text" class="form-control" id="drivingLicence" name="drivingLicence" value="<?php if(isset($config['drivingLicence'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Changer votre date d'obtention de votre permis de conduire :</label>
				<input type="date" class="form-control" id="drivingLicenceObtainDate" name="drivingLicenceObtainDate" value="<?php if(isset($config['drivingLicenceObtainDate'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitUserOption']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>