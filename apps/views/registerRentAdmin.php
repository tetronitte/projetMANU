<div class="container-fluid">

	<h3 class="text-center">Enregistrer une location</h3>

	<div id="registerRentAdmin" class="row">

	<?= form_open('RentController/add','class="col-12"'); ?>

		<div class="form-group text-center" id="formRentAdmin">
			<div id="hrbar" class="col-12"></div>

				<label class="col-12">Date de d�but :</label>
					<input type="date" class="form-control" id="dateStart" name="dateStart" value="<?php if(isset($config['dateStart'])){ echo '';}?>">
				<span class="help-block"><?= form_error('dateStart') ?></span>

				<label class="col-12">Date de fin :</label>
					<input type="date" class="form-control" id="dateEnd" name="dateEnd" value="<?php if(isset($config['dateEnd'])){ echo '';}?>">
				<span class="help-block"><?= form_error('dateEnd') ?></span>

				<label class="col-12">plaque immat v�hicule :</label>
				<input type="text class="form-control" id="cardId" name="cardId" value="<?php if(isset($config['cardId'])){ echo '';}?>"> <!-- changer pour select option -->
				<?php //foreach( as $card){ ?>
					<!--<?php //echo form_dropdown('cardId', $card->getId(),['class' => 'form-control', 'id' => 'cardId'])?>-->
					<?php //} ?>
				<span class="help-block"><?= form_error('cardId') ?></span>

				<label class="col-12">nom pr�nom email client :</label>
				<input type="usersId" class="form-control" id="usersId" name="usersId" value="<?php if(isset($config['usersId'])){ echo '';}?>">
				<?php //foreach( as $user){ ?>
					<!--<?php //echo form_dropdown('usersId', $user->getId(),['class' => 'form-control', 'id' => 'usersId'])?>-->
					<?php //} ?>
				<span class="help-block"><?= form_error('usersId') ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitRentAdmin']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>