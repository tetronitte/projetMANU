<div class="container-fluid">
	<h3 class="text-center">VÃ©hicules louÃ©s :</h3>
	<div id="listRentUserVehicles" class="row">
		<div id="hrbar" class="col-12"></div>
			<?= anchor("", "Supprimer la location",['class' => 'btn btn-danger', 'id' => 'DeleteRent']); ?>
			<?php
				/*foreach($cars as $car) {
					?><div class="col-6">
						<h2>Détails du vehicule :</h2>
						<p>Nom : <?= $car->getModel()->getName(); ?></p>
						<p> Marque : <?= $car->getModel()->getBrand(); ?></p>
						<p>Type de consommation : <?= $car->getModel()->getFueltype(); ?></p>
						<p>catégorie : <?= $car->getModel()->getCategory(); ?></p>
						<p>nombres de portes : <?= $car->getModel()->getDoors(); ?></p>
						<h2>Description du vehicule :</h2>
						<p><?= $car->getDetails(); ?></p>
						<h2>Disponibilité :</h2>
						<?php if($car->getDisponibility() == 1){$Disponibility = 'oui'; } else {$Disponibility = 'non';}?>
						<p><?= $Disponibility;?></p>
					</div>
					<img id="imgVehicles" src="<?= base_url('assets/img/') . $car->getPicture(); ?>" class="col-6 h-50 w-100" alter="img_vehicles">
					<div id="hrbar" class="col-8"></div><?php
				}*/
			?>
	</div>

	<!-- ajouter pagination -->
</div>