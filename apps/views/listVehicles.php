<div class="container-fluid">
	<?= form_open('url'); ?>
		<div class="form-group input-group">
			<div  id="searchIndexDiv" class="input-group-prepend">
				<input type="text" id="searchIndex" name="searchIndex" class="form-control" value="<?= '';?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchIndexButton']); ?>
			</div>
		</div>
	<?= form_close() ?>

	<div id="listAllVehicles" class="row overflow-auto">
		<div id="hrbar" class="col-12"></div>
			<?php

				foreach($cars as $car) {
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
					<img id="imgVehicles" src="<?= $car->getPicture(); ?>" class="col-6" alter="img_vehicles">
					<div id="hrbar" class="col-8"></div><?php
				}
			?>
	</div>

	<!-- ajouter pagination -->
</div>