<div class="container-fluid">

	<h3 class="text-center">Enregistrer un retour</h3>

	<div id="registerReturnAdmin" class="row">

	<?= form_open('ReturnController/addReturn','class="col-12"'); ?>

		<div class="form-group text-center" id="formReturnAdmin">
			<div id="hrbar" class="col-12"></div>

				<label class="col-12">Date de retour :</label>
					<input type="date" class="form-control" id="dateReturn" name="dateReturn" value="<?php if(isset($config['dateReturn'])){ echo '';}?>">
				<span class="help-block"><?=  form_error('dateReturn') ?></span>

				<label class="col-12">Sur la location :</label>
				<input type="number" class="form-control" id="rentsId" name="rentsId" value="<?php if(isset($config['rentsId'])){ echo '';}?>"> <!-- changer pour select option -->
				<?php //foreach( as $rent){ ?>
					<!--<?php //echo form_dropdown('rentsId', $rent->getId(),['class' => 'form-control', 'id' => 'rentsId'])?>-->
					<?php //} ?>
				<span class="help-block"><?= form_error('rentsId') ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitReturnAdmin']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>