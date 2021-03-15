<div class="container-fluid">
	<h3 class="text-center">Véhicules loués :</h3>
	<div id="listRentUserVehicles" class="row">
		<div id="hrbar" class="col-12"></div>
			<?php
				if(isset($rents)) {
					foreach($rents as $rent) {
						$id = $rent->getId();
						?><div class="col-6">
							<h2>Détails du vehicule :</h2>
							<p>Utilisateur : <?= $rent->getUser()->getLastname().' '.$rent->getUser()->getFirstname(); ?></p>
							<p>Date de début : <?= $rent->getDateStart(); ?></p>
							<p>Date de fin : <?= $rent->getDateEnd(); ?></p>
							<p>Vehicule : <?= $rent->getCar()->getModel()->getName(); ?></p>
						</div>
						<!-- ERREUR errorDeleteRent -->
					<img id="imgVehicles" src="<?= base_url('assets/img/') . $rent->getCar()->getPicture(); ?>" class="col-6 h-60 w-100" alter="img_vehicles">
					<?= anchor("RentController/deleteRent/$id", "Supprimer la location",['class' => 'btn btn-danger col-6']);?>
					<div id="hrbar" class="col-8"></div><?php
					}
				}
			?>
		</div>
</div>