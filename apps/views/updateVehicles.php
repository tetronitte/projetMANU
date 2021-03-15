<div class="container-fluid">
	<div id="listcar" class="row">
	<?= form_open('CarController/update','class="col-12"'); ?>
	<div class="text-center col-12">
		<div class="form-group text-center" id="formCar">
			<label>Nom :</label>
				<input type="name" class="form-control" id="name" name="name" value="<?php if(isset($car)) echo $car->getModel()->getName() ?>">
			<span class="help-block"><?= form_error('name') ?></span>

			<label class="col-12">Marque :</label>
				<input type="text" class="form-control" id="brand" name="brand" value="<?php if(isset($car)) echo $car->getModel()->getBrand(); ?>">
			<span class="help-block"><?= form_error('brand') ?></span>

			<label class="col-12">Type de consommation :</label>
				<input type="text" class="form-control" id="fueltype" name="fueltype" value="<?php if(isset($car)) echo $car->getModel()->getFueltype() ?>">
			<span class="help-block"><?= form_error('fueltype') ?></span>

			<label class="col-12">Catégorie :</label>
				<input type="text" class="form-control" id="category" name="category" value="<?php if(isset($car)) echo $car->getModel()->getCategory() ?>">
			<span class="help-block"><?= form_error('category') ?></span>

			<label class="col-12">Kilométrage :</label>
				<input type="text" class="form-control" id="mileage" name="mileage" value="<?php if(isset($car)) echo $car->getMileage() ?>">
			<span class="help-block"><?= form_error('mileage') ?></span>

			<label class="col-12">Plaque Immat :</label>
				<input type="text" class="form-control" id="licensePlate" name="licensePlate" value="<?php if(isset($car)) echo $car->getLicensePlate() ?>">
			<span class="help-block"><?= form_error('licensePlate') ?></span>

			<label class="col-12">Nombre de portes :</label>
				<input type="text" class="form-control" id="numberdoors" name="numberdoors" value="<?php if(isset($car)) echo $car->getModel()->getDoors(); ?>">
			<span class="help-block"><?= form_error('numberdoors') ?></span>

			<label class="col-12">Description :</label>
				<input type="textarea" class="form-control" id="description" name="description" value="<?php if(isset($car)) echo $car->getDetails(); ?>">
			<span class="help-block"><?= form_error('description') ?></span>

			<label class="col-12">Disponibilité :</label>
				<input type="date" class="form-control" id="disponibility" name="disponibility" value="<?php if(isset($car)) echo $car->getDisponibility() ?>">
			<span class="help-block"><?= form_error('disponibility') ?></span>

			<?= form_submit("send", "Valider",['class' => 'btn btn-warning col-12', 'id' => 'submitCarOption']); ?>
	<?= form_close() ?>
		</div>
	</div>

</div>