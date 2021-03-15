<div class="container-fluid">
	<?= form_open('url'); ?>
		<div class="form-group input-group">
			<div  id="searchIndexDiv" class="input-group-prepend">
				<input type="text" id="searchIndex" name="searchIndex" class="form-control" value="<?= '';?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchIndexButton']); ?>
			</div>
		</div>
	<?= form_close() ?>
	<div id="listAllRents" class="row">
		<div id="hrbar" class="col-12"></div>
			<table class="table table-dark table-striped ">
				<thead>
					<tr>
						<th></th>
						<th>Deb</th>
						<th>Fin</th>
						<th>Voiture</th>
						<th>Client</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($rents as $val) { ?>
						<tr>
							<td><a href="<?= base_url('index.php/RentController/deleteRent/'.$val->getId())?>"><i class="fa fa-trash"></i></a></td>
							<td><?= date('d/m/Y',strtotime($val->getDateStart())) ?></td>
							<td><?= date('d/m/Y',strtotime($val->getDateEnd())) ?></td>
							<td><?= $val->getCar()->getModel()->getName() ?></td>
							<td><?= $val->getUser()->getFirstname()." ".$val->getUser()->getLastname() ?></td>
						</tr>
					<?php } ?>
				</tbody>
				</table>
	</div>
	<!-- ajouter pagination -->
</div>