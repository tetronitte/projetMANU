<div class="container-fluid">
	<?= form_open('CarController/list'); ?>
		<div class="form-group input-group">
			<div  id="searchVehiclesDiv" class="input-group-prepend">
				<input type="text" id="searchVehicle" name="search" class="form-control" value="<?php if(isset($search)) {echo $search;} else if(isset($this->session->search)) { echo $this->session->search; unset($this->session->search);} ?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchVehicleButton']); ?>
			</div>
		</div>
	<?= form_close() ?>


	<div id="listAllVehicle" class="row overflow-auto">
		<div id="hrbar" class="col-12"></div>
			<?php
			if(isset($cars)) {
				foreach($cars as $car) {
					$id = $car->getId();
					?><div class="col-6">
						<h2>Détails du vehicule :</h2>
						<p>Nom : <?= $car->getModel()->getName(); ?></p>
						<p>Marque : <?= $car->getModel()->getBrand(); ?></p>
						<p>Type de consommation : <?= $car->getModel()->getFueltype(); ?></p>
						<p>Catégorie : <?= $car->getModel()->getCategory(); ?></p>
						<p>Nombres de portes : <?= $car->getModel()->getDoors(); ?></p>
						<p>Kilométrage : <?= $car->getMileage(); ?></p>
						<p>Plaque Immat : <?= $car->getLicensePlate(); ?></p>
						<h2>Description du vehicule :</h2>
						<p><?= $car->getDetails(); ?></p>
						<h2>Disponibilité :</h2>
						<?php if($car->getDisponibility() == 1){$Disponibility = 'oui'; } else {$Disponibility = 'non';}?>
						<p><?= $Disponibility;?></p>
					</div>
					<img id="imgVehicles" src="<?= base_url('assets/img/') . $car->getPicture(); ?>" class="col-6 h-60 w-100" alter="img_vehicles">
					<?php if($car->getDisponibility()) echo anchor("CarController/deleteCar/$id", "Supprimer véhicule",['class' => 'btn btn-danger col-6']);?>
					<?= anchor("CarController/updateCar/$id", "Modifier véhicule",['class' => 'btn btn-primary col-6']);?>
					<div id="hrbar" class="col-8"></div><?php
				}
			}
			?>
	</div>
</div>