<div class="container-fluid">
	<?= form_open('CarController/list'); ?>
		<div class="form-group input-group">
			<div  id="searchIndexDiv" class="input-group-prepend">
				<input type="text" id="searchIndex" name="search" class="form-control" value="<?php if(isset($search)) {echo $search;} else if(isset($this->session->search)) { echo $this->session->search; unset($this->session->search);} ?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchIndexButton']); ?>
			</div>
		</div>
	<?= form_close() ?>

	<div id="listAllVehicles" class="row overflow-auto">
		<div id="hrbar" class="col-12"></div>
			<?php
				if(isset($cars)) {
					foreach($cars as $car) {
						?><div class="col-12 col-sm-6">
							<h2>Détails du véhicule :</h2>
							<p>Nom : <?= $car->getModel()->getName(); ?></p>
							<p>Marque : <?= $car->getModel()->getBrand(); ?></p>
							<p>Type de consommation : <?= $car->getModel()->getFueltype(); ?></p>
							<p>Catégorie : <?= $car->getModel()->getCategory(); ?></p>
							<p>Nombre de portes : <?= $car->getModel()->getDoors(); ?></p>
							<h2>Description du véhicule :</h2>
							<p><?= $car->getDetails(); ?></p>
							<h2>Disponibilité :</h2>
							<?php if($car->getDisponibility() == 1){$Disponibility = 'oui'; } else {$Disponibility = 'non';}?>
							<p><?= $Disponibility;?></p>
						</div>
						<img id="imgVehicles" src="<?= base_url('assets/img/') . $car->getPicture(); ?>" class="col-12 col-sm-6 h-60 w-100" alter="img_vehicles">
						<div id="hrbar" class="col-8"></div><?php
					}
				}
			?>
	</div>
</div>