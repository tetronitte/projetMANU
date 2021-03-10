<div class="container-fluid">

	<h3 class="text-center">Enregistrer une location</h3>

	<div id="registerRentAdmin" class="row">

	<?= form_open('url','class="col-12"'); ?>

		<div class="form-group text-center" id="formRentAdmin">
			<div id="hrbar" class="col-12"></div>

				<label class="col-12">Date de début :</label>
					<input type="date" class="form-control" id="dateStart" name="dateStart" value="<?php if(isset($config['dateStart'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">Date de fin :</label>
					<input type="date" class="form-control" id="dateEnd" name="dateEnd" value="<?php if(isset($config['dateEnd'])){ echo '';}?>">
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">plaque immat véhicule :</label>
					<?= form_dropdown('cardId', $options,['class' => 'form-control', 'id' => 'cardId'])?> <!-- remplacer $option par l'array de nom de véhicule -->
				<span class="help-block"><?= '';//error ?></span>

				<label class="col-12">nom prénom email client :</label>
					<?= form_dropdown('usersId', $options,['class' => 'form-control', 'id' => 'usersId'])?>
				<span class="help-block"><?= '';//error ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitRentAdmin']); ?>
	<?= form_close() ?>
		</div>
	</div>
</div>