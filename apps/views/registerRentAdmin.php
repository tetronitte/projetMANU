<div class="container-fluid">

	<h3 class="text-center">Enregistrer une location</h3>

	<div id="registerRentAdmin" class="row">

	<?= form_open('RentController/addRent','class="col-12"'); ?>

		<div class="form-group text-center" id="formRentAdmin">
			<div id="hrbar" class="col-12"></div>

				<label class="col-12">Date de début :</label>
					<input type="date" class="form-control" id="dateStart" name="dateStart" value="<?php if(isset($rent)) echo $rent['dateStart'] ?>">
				<span class="help-block"><?= form_error('dateStart') ?></span>

				<label class="col-12">Date de fin :</label>
					<input type="date" class="form-control" id="dateEnd" name="dateEnd" value="<?php if(isset($rent)) echo $rent['dateEnd'] ?>">
				<span class="help-block"><?= form_error('dateEnd') ?></span>

				<label class="col-12">Plaque d'immatriculation :</label>
					<input type="text" class="form-control" id="cardId" name="licensePlate" value="<?php if(isset($rent)) echo $rent['licensePlate'] ?>">
				<span class="help-block"><?= form_error('licensePlate') ?></span>

				<label class="col-12">E-mail client :</label>
					<input type="text" class="form-control" id="usersId" name="mail" value="<?php if(isset($rent)) echo $rent['mail'] ?>">
				<span class="help-block"><?= form_error('mail') ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitRentAdmin']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>