<div class="container-fluid">
	<h3 class="text-center">Changer votre mot de passe</h3>
	<div id="updatePassword" class="row">
	<?= form_open('url1','class="col-12"'); ?>
			<div class="form-group text-center" id="formUpdatePassword">
				<div id="hrbar" class="col-12"></div>

			<label class="col-12">votre ancien mdp :</label>
				<input type="text" class="form-control" id="oldpwd" name="oldpwd" value="<?php if(isset($config['oldpwd'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Changer le mot de passe :</label>
				<input type="text" class="form-control" id="pwd" name="pwd" value="<?php if(isset($config['pwd'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<label class="col-12">Confirmer le mot de passe :</label>
				<input type="text" class="form-control" id="pwd" name="pwd" value="<?php if(isset($config['pwd'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitUserPwd']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>