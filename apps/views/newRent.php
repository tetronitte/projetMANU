<div class="container-fluid">
	<h3 class="text-center">NOUVELLE LOCATION</h3>
	<div id="newRent" class="row">
	<?= form_open('index.php/RentController/add'); ?>
		<?= validation_errors() ?>
		<div id="hrbar" class="col-12"></div>
					<div class="form-group">
						<label for="start" class="text-left">Date de début</label>
						<input name="start" required type="date" class="form-control" id="start" value="<?php echo set_value('start'); ?>">
					</div>
					<div class="form-group">
						<label for="end" class="text-left">Date de fin</label>
						<input name="end" required type="date" class="form-control" id="end" value="<?php echo set_value('end'); ?>">
					</div>
					<div class="form-group">
					<label for="car" class="text-left">Voiture disponible</label>
						<select name="car" id="car" size="1" class="form-control" required>
						<?php foreach($cars as $val) { ?>
								<option value="<?= $val->id ?>"><?= $val->name ?>
						<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="user" class="text-left">Client</label>
						<select name="user" id="user" size="1" class="form-control" required>
						<?php foreach($users as $val) { ?>
								<option value="<?= $val->id ?>"><?= $val->firstname.' '.$val->lastname ?>
						<?php } ?>
						</select>
					</div>
					<br>
					<div class="text-center">
						<button class="btn btn-primary" type="submit">Ajouter</button>
					</div>
					<?php echo form_close(''); ?>
	</div>
	<!-- ajouter pagination -->
</div>