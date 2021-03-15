<div class="container-fluid">
	<h3 class="text-center">VÃ©hicules louÃ©s :</h3>
	<div id="listRentUserVehicles" class="row">
		<div id="hrbar" class="col-12"></div>
			<?php
				foreach($rents as $rent) {
					$id = $rent->getId();
					?><div class="col-6">
						<h2>Détails du vehicule :</h2>
						<p>Utilisateur <?= $rent->getUser(); ?></p>
						<p> Date de début : <?= $car->getDateStart(); ?></p>
						<p> Date de fin : <?= $car->getDateEnd(); ?></p>
						<p>Vehicule : <?= $car->getCar(); ?></p>
					</div>
					<img id="imgVehicles" src="<?= base_url('assets/img/') . $car->getPicture(); ?>" class="col-6 h-60 w-100" alter="img_vehicles">
					<?= anchor("RentController/deleteRent/$id", "Supprimer véhicule",['class' => 'btn btn-danger col-6']);?>
					<div id="hrbar" class="col-8"></div><?php
				}
			?>
	</div>
</div>