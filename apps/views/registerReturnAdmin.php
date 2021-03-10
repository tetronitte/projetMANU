<div class="container-fluid">

	<h3 class="text-center">Enregistrer un retour</h3>

	<div id="registerReturnAdmin" class="row">

	<?= form_open('url','class="col-12"'); ?>

		<div class="form-group text-center" id="formReturnAdmin">
			<div id="hrbar" class="col-12"></div>

				<label class="col-12">Date de retour :</label>
					<input type="date" class="form-control" id="dateReturn" name="dateReturn" value="<?php if(isset($config['dateReturn'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Sur la location :</label>
					<?= form_dropdown('rentsId', $options,['class' => 'form-control', 'id' => 'rentsId'])?>  <!-- remplacer $option par l'array de nom des locations -->
				<span class="help-block"><?= '';//error ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitReturnAdmin']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>