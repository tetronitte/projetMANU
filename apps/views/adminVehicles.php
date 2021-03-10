<div class="container-fluid">
	<?= form_open('url'); ?>
		<div class="form-group input-group">
			<div  id="searchVehiclesDiv" class="input-group-prepend">
				<input type="text" id="searchVehicle" name="searchVehicle" class="form-control" value="<?= '';?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchVehicleButton']); ?>
			</div>
		</div>
	<?= form_close() ?>

	<div id="listAllVehicle" class="row">
		<div id="hrbar" class="col-12"></div>
			<?php //foreach(){
				//avec scroll dans la div et un bouton pour supprimer le client
			//}
			?>
	</div>

	<!-- ajouter pagination -->
</div>