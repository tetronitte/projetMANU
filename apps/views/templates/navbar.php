<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse row" id="navbarNav">
		<ul class="navbar-nav col-12">

		<?php if (isset($this->session->id) && empty($this->session->admin)){ ?>
				<li class="nav-item col-lg-2">
					<?= anchor("CarController/list", "Nos véhicules",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
				</li>

				<li class="nav-item col offset-lg-5">
					<?= anchor("RentController/list", "Location",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
				</li>

				<li class="nav-item col">
					<?= anchor("UserController/profil", "Option",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
				</li>

				<li class="nav-item col">
					<?= anchor("UserController/signout", "Déconnexion",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
				</li>
		<?php } if (isset($this->session->admin)){  ?>

				<li class="nav-item col-lg-2">
					<?= anchor("CarController/list", "Infos véhicules",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
				</li>

				<li class="nav-item col-lg-2">
					<?= anchor("UserController/listUser", "Infos clients",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
				</li>

			
				<li class="nav-item col-lg-2">
					<?= anchor("RentController/list", "Liste locations",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
				</li>

				<li class="nav-item offset-lg-1 text-center">
					<h2>Admin Mode</h2>
				</li>

				<li class="nav-item col">
					<?= anchor("UserController/profil", "Option",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
				</li>

				<li class="nav-item col">
					<?= anchor("UserController/signout", "Déconnexion",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
				</li>
		<?php } if (empty($this->session->id)) { ?>

				<li class="nav-item col-lg-2">
					<?= anchor("CarController/list", "Nos véhicules",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
				</li>

				<li class="nav-item col offset-lg-6">
					<?= anchor("UserController/login", "Inscription/Login",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
				</li>

		<?php } ?>

	    </ul>
</div>
</nav>
<div id="hrbar" class="col-12"></div>