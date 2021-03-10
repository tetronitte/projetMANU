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
		<?= anchor("'url'", "Enregistrer une location",['class' => 'btn btn-warning', 'id' => 'registerRent']); ?>
		<?= anchor("'url'", "Enregistrer un retour",['class' => 'btn btn-warning', 'id' => 'registerReturn']); ?>
	</div>
	<div id="listAdminRent" class="row">
		<div id="hrbar" class="col-12"></div>
			<?php //foreach(){
				//avec scroll dans la div
			//}
			?>
	</div>

	<!-- ajouter pagination -->
</div>