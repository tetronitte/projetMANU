<div class="container-fluid">
	<h3 class="text-center">Changer votre mot de passe</h3>
	<div id="updatePassword" class="row">
	<?= form_open('UserController/updatePassword','class="col-12"'); ?>
			<div class="form-group text-center" id="formUpdatePassword">
				<div id="hrbar" class="col-12"></div>

			<label class="col-12">Votre ancien mdp :</label>
				<input type="password" class="form-control" id="oldpwd" name="oldPwd" value="<?php if(isset($user)) echo $user['oldPwd'] ?>">
			<span class="help-block"><?php echo form_error('oldPwd'); if (isset($error)) echo $error; ?></span>

			<label class="col-12">Changer le mot de passe :</label>
				<input type="text" class="form-control" id="pwd" name="pwd" value="<?php if(isset($user)) echo $user['pwd'] ?>">
			<span class="help-block"><?= form_error('pwd') ?></span>

			<label class="col-12">Confirmer le mot de passe :</label>
				<input type="password" class="form-control" id="verifPwd" name="verifPwd" value="<?php if(isset($user)) echo $user['verifPwd'] ?>">
			<span class="help-block"><?= form_error('verifPwd') ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitUserPwd']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>