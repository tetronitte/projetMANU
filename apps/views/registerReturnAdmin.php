<div class="container-fluid">

	<h3 class="text-center">Enregistrer un retour</h3>

	<div id="registerReturnAdmin" class="row">

	<?= form_open('ReturnController/addReturn','class="col-12"'); ?>

		<div class="form-group text-center" id="formReturnAdmin">
			<div id="hrbar" class="col-12"></div>

				<label class="col-12">Date de retour :</label>
					<input type="date" class="form-control" id="dateReturn" name="dateReturn" value="<?php if(isset($return)) echo $return['dateReturn'] ?>">
				<span class="help-block"><?php if(isset($errorDate)) echo $errorDate; else echo form_error('dateReturn'); ?></span>

				<label class="col-12">Numéro de location :</label>
					<input type="text" class="form-control" id="rentsId" name="numRent" value="<?php if(isset($return)) echo $return['numRent'] ?>">
				<span class="help-block"><?php if(isset($errorNumRent)) echo $errorNumRent; else echo form_error('numRent'); ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitReturnAdmin']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>