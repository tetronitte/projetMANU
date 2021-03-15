<div class="container-fluid">
	<?= form_open('url'); ?>
		<div class="form-group input-group">
			<div  id="searchAdminRentDiv" class="input-group-prepend">
				<input type="text" id="searchAdminRent" name="searchAdminRent" class="form-control" value="<?= '';?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchAdminRentButton']); ?>
			</div>
		</div>
	<?= form_close() ?>
	<div class="text-center">
		<?= anchor("RentController/", "Enregistrer une location",['class' => 'btn btn-warning', 'id' => 'registerRent']); ?>
		<?= anchor("ReturnController/", "Enregistrer un retour",['class' => 'btn btn-warning', 'id' => 'registerReturn']); ?>
	</div>
	<div id="listAdminRent" class="row">
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