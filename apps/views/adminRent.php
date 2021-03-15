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
		<?= anchor("RentController/add", "Enregistrer une location",['class' => 'btn btn-warning', 'id' => 'registerRent']); ?>
		<?= anchor("ReturnController/addReturn", "Enregistrer un retour",['class' => 'btn btn-warning', 'id' => 'registerReturn']); ?>
	</div>
	<div id="listAdminRent" class="row overflow-auto">
		<div id="hrbar" class="col-12"></div>
			<?php
			if(isset($rents)) {
				foreach($rents as $rent) {
					$id = $rent->getId();
					?><div class="col-12 col-sm-6">
						<h2>D�tails du vehicule :</h2>
						<p>Utilisateur : <?= $rent->getUser()->getLastname().' '.$rent->getUser()->getFirstname(); ?></p>
						<p>Date de d�but : <?= $rent->getDateStart(); ?></p>
						<p>Date de fin : <?= $rent->getDateEnd(); ?></p>
						<p>Vehicule : <?= $rent->getCar()->getModel()->getName(); ?></p>
						<p>Status : <?php if($rent->getArchived()) echo 'annulée'; else echo 'valide' ?></p>
					</div>
					<img id="imgVehicles" src="<?= base_url('assets/img/') . $rent->getCar()->getPicture(); ?>" class="col-12 col-sm-6 h-60 w-100" alter="img_vehicles">
					<div id="hrbar" class="col-8"></div><?php
				}
			}
			?>
	</div>
</div>