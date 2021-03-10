<div class="container-fluid">
	<div id="listUser" class="row">
	<?= form_open('url1','class="col-12"'); ?>

		<div class="form-group text-center" id="formLogin">
			<label>Changer d'email :</label>
				<input type="email" class="form-control" id="emailchange" name="emailchange" value="<?php if(isset($config['emailchange'])){ echo '';};?>">
			<span class="help-block"><?= '';//error ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitUserOption']); ?>

	<?= form_close() ?>
	<?= form_open('url2','class="col-12"'); ?>

			<label class="col-12">Changer le mot de passe :</label>
				<input type="text" class="form-control" id="passwordchange" name="passwordchange" value="<?php if(isset($config['passwordchange'])){ echo '';}?>">
			<span class="help-block"><?= '';//error ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitUserOption']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>