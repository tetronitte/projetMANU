<div class="container-fluid">

	<h3 class="text-center">LOGIN</h3>

	<div id="listLogin" class="row">
		<div id="hrbar" class="col-12"></div>
	<?= form_open('url','class="col-12"'); ?>
		<div class="form-group text-center" id="formLogin">
			<label>Email :</label>
				<input type="email" class="form-control" id="emailLogin" name="emailLogin" value="<?php if(isset($config['email'])){ echo '';};?>">
			<span class="help-block"><?= '';//error ?></span>
			<label class="col-12">Mot de passe :</label>
				<input type="text" class="form-control" id="passwordLogin" name="passwordLogin" value="<?php if(isset($config['password'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<?= form_checkbox('stayloginin', 'accept', TRUE);?><label>rester connecté</label>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitLogin']); ?>
	<?= form_close() ?>
		</div>
	</div>
	<div class="text-center">
		<?= anchor("'url'", "Vous n'êtes pas inscrit ?",['class' => 'btn text-info', 'id' => 'redirectSignIn']); ?>
	</div>
</div>