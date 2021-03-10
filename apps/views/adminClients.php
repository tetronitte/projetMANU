<div class="container-fluid">
	<?= form_open('url'); ?>
		<div class="form-group input-group">
			<div  id="searchClientDiv" class="input-group-prepend">
				<input type="text" id="searchClient" name="searchClient" class="form-control" value="<?= '';?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchClientButton']); ?>
			</div>
		</div>
	<?= form_close() ?>

	<div id="listAllClient" class="row">
		<div id="hrbar" class="col-12"></div>
			<?php //foreach(){
				//avec scroll dans la div et un bouton pour supprimer le client
			//}
			?>
	</div>

	<!-- ajouter pagination -->
</div>