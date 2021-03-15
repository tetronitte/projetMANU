<div class="container-fluid">

	<h3 class="text-center">Enregistrer une location</h3>

	<div id="registerRentAdmin" class="row">

	<?= form_open('RentController/add','class="col-12"'); ?>

		<div class="form-group text-center" id="formRentAdmin">
			<div id="hrbar" class="col-12"></div>

				<label class="col-12">Date de début :</label>
					<input type="date" class="form-control" id="dateStart" name="dateStart" value="<?php if(isset($config['dateStart'])){ echo '';}?>">
				<span class="help-block"><?= form_error('dateStart') ?></span>

				<label class="col-12">Date de fin :</label>
					<input type="date" class="form-control" id="dateEnd" name="dateEnd" value="<?php if(isset($config['dateEnd'])){ echo '';}?>">
				<span class="help-block"><?= form_error('dateEnd') ?></span>

				<label class="col-12">plaque immat véhicule :</label>
				<input type="text" class="form-control" id="cardId" name="cardId" value="<?php if(isset($config['cardId'])){ echo '';}?>"> 
				<span class="help-block"><?= form_error('cardId') ?></span>

				<label class="col-12">nom prénom email client :</label>
				<input type="usersId" class="form-control" id="usersId" name="usersId" value="<?php if(isset($config['usersId'])){ echo '';}?>">
				<span class="help-block"><?= form_error('usersId') ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitRentAdmin']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>