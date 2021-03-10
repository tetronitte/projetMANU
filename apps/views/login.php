<div class="container-fluid">
	<h3 class="text-center">LOGIN</h3>

	<div id="listLogin" class="row">
		<div id="hrbar" class="col-12"></div>
	<?= form_open('UserController/login','class="col-12"'); ?>
		<div class="form-group text-center" id="formLogin">
			<label>Email :</label>
				<input type="email" class="form-control" id="mail" name="mail" value="<?php if(isset($user)) echo $user['mail'] ?>">
			<span class="help-block"><?= form_error('mail') ?></span>
			<label class="col-12">Mot de passe :</label>
				<input type="text" class="form-control" id="pwd" name="pwd" value="<?php if(isset($user)) echo $user['pwd'] ?>">
			<span class="help-block"><?= form_error('pwd') ?></span>

			<?= form_checkbox('autolog', 'accept', TRUE);?><label>rester connecté</label>
			<?= $errors ?><!-- FAIRE UN BEAU MESSAGE d'ERREUR -->
			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitLogin']); ?>
	<?= form_close() ?>
		</div>
	</div>
	<div class="text-center">
		<?= anchor("UserController/register", "Vous n'êtes pas inscrit ?",['class' => 'btn text-info', 'id' => 'redirectSignIn']); ?>
	</div>
</div>