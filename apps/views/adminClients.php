<div class="container-fluid">
	<?= form_open('UserController/listUser'); ?>
		<div class="form-group input-group">
			<div  id="searchClientDiv" class="input-group-prepend">
				<input type="text" id="searchClient" name="search" class="form-control" value="<?php if(isset($search)) {echo $search;} else if(isset($this->session->search)) { echo $this->session->search; unset($this->session->search);} ?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchClientButton']); ?>
			</div>
		</div>
	<?= form_close() ?>

	<div id="listAllClient" class="row overflow-auto">
		<div id="hrbar" class="col-12"></div>
			<?php 
				?><div class="col-6"><?php
			if(isset($users)){
				foreach($users as $user){
				$id = $user->getId();
					?><p>Nom : <?= $user->getFirstName();?></p>
					<p>Prénom : <?= $user->getLastName();?></p>
					<p>Email : <?= $user->getMail();?></p>
					<p>Année de naissance : <?= $user->getBirthdate();?></p>
					<p>Numéro de téléphone : <?= $user->getPhone();?></p>
					<p>Ville : <?= $user->getCity();?></p>
					<p>Code postal : <?= $user->getPostal();?></p>
					<p>Adresse : <?= $user->getAddress();?></p>
					<p>Numéro de permis de conduire : <?= $user->getDrivingLicense();?></p>
					<p>Date de l'obtention du permis : <?= $user->getdrivingLicenseObtainDate();?></p>
					<?= anchor("UserController/deleteUser/$id", "Supprimer utilisateur",['class' => 'btn btn-warning col-6', 'id' => 'deleteClientButton']);?>

					<div id="hrbar" class="col-8"></div>
					<?php
				}
			}else{
				?><p>Il n'y a pas d'utilisateur à ce nom</p><?php
			}
			?></div><?php
				if(isset($this->session->errorDeleteUser)) var_dump($this->session->errorDeleteUser);
			?>
	</div>
</div>