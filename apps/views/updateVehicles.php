<div class="container-fluid">
	<div id="listcar" class="row">
	<?= form_open_multipart('CarController/updateCar/'.$car->getId(),'class="col-12"'); ?>
	<div class="text-center col-12">
		<div class="form-group text-center" id="formCar">
			<label>Nom :</label>
				<input type="name" class="form-control" id="name" name="name" value="<?php if(isset($car)) echo $car->getModel()->getName() ?>" disabled>
			<span class="help-block"><?= form_error('name') ?></span>

			<label class="col-12">Marque :</label>
				<input type="text" class="form-control" id="brand" name="brand" value="<?php if(isset($car)) echo $car->getModel()->getBrand(); ?>" disabled>
			<span class="help-block"><?= form_error('brand') ?></span>

			<label class="col-12">Kilométrage :</label>
				<input type="text" class="form-control" id="mileage" name="mileage" value="<?php if(isset($car)) echo $car->getMileage() ?>">
			<span class="help-block"><?= form_error('mileage') ?></span>

			<label class="col-12">Plaque d'immatriculation :</label>
				<input type="text" class="form-control" id="licensePlate" name="licensePlate" value="<?php if(isset($car)) echo $car->getLicensePlate() ?>">
			<span class="help-block"><?= form_error('licensePlate') ?></span>

			<label class="col-12">Description :</label>
				<input type="textarea" class="form-control" id="description" name="details" value="<?php if(isset($car)) echo $car->getDetails(); ?>">
			<span class="help-block"><?= form_error('details') ?></span>

			<label class="col-12">Nouvelle image :</label>
				<input type="file" name="picture" size="20" />
			<span class="help-block"><?= form_error('picture') ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitCarOption']); ?>
	<?= form_close() ?>
		</div>
	</div>

</div>