<div class="container-fluid">
	<?= form_open('url'); ?>
		<div class="form-group input-group">
			<div  id="searchIndexDiv" class="input-group-prepend">
				<input type="text" id="searchIndex" name="searchIndex" class="form-control" value="<?= '';?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchIndexButton']); ?>
			</div>
		</div>
	<?= form_close() ?>

	<div id="listAllVehicles" class="row">
		<div id="hrbar" class="col-12"></div>
			<?php 
				foreach($cars as $car) {
					?><div class="col-6">
					<p><?= $car->getModel() ?></p>
					<p><?= $car->getDetails() ?></p>
					<p><?= $car->getDisponibility() ?></p>
					</div>
					<img src="<?= $car->getPicture ?>" class="col-6" alter="img_vehicles"><?php
				}
			?>
	</div>

	<!-- ajouter pagination -->
</div>