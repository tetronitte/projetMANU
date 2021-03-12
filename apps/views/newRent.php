<div class="container-fluid">
	<?= form_open('url'); ?>
		<div class="form-group input-group">
			<div  id="searchIndexDiv" class="input-group-prepend">
				<input type="text" id="searchIndex" name="searchIndex" class="form-control" value="<?= '';?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchIndexButton']); ?>
			</div>
		</div>
	<?= form_close() ?>
	<div id="newRent" class="row">
		<div id="hrbar" class="col-12"></div>
			<?php echo validation_errors(); ?>
					<?php echo form_open('index.php/RentController/insert'); ?>
					<div class="form-group">
						<label for="start" class="text-left">Date de début</label>
						<input name="start" required type="date" class="form-control" id="start" value="<?php echo set_value('start'); ?>">
					</div>
					<div class="form-group">
						<label for="end" class="text-left">Date de fin</label>
						<input name="end" required type="date" class="form-control" id="end" value="<?php echo set_value('end'); ?>">
					</div>
					<div class="form-group">
						<label for="car" class="text-left">Voiture</label>
						<input name="car" required type="select" class="form-control" id="car" value="<?php echo set_value('car'); ?>">
					</div>
					<div class="form-group">
						<label for="user" class="text-left">Client</label>
						<select name="user" id="user" size="1" class="form-control" required>
						<?php foreach($list as $val) { ?>
								<option value="<?= $val->id ?>"><?= $val->firstname.' '.$val->lastname ?>
						<?php } ?>
						</select>
					</div>
					<br>
					<div class="text-center">
						<button class="btn btn-primary" type="submit">Ajouter</button>
					</div>



					<div class="form-group">
						<label for="patient" class="text-left">Nom du patient</label>
						<select name="patient" id="patient" size="1" class="form-control" required>
						<?php foreach($list as $val) { ?>
								<option value="<?= $val['id'] ?>" <?php if(!isset($id) && $profil[0]->idPatients == $val['id']) echo "selected";?> > <?= $val['firstname'].' '.$val['lastname'] ?>
						<?php } ?>
						</select>
                	</div>



					<?php echo form_close(''); ?>
	</div>
	<!-- ajouter pagination -->
</div>