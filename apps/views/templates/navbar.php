<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse row" id="navbarNav">
		<ul class="navbar-nav col-12">
			<?php if(isset($_SESSION['id'])){?>

			<li class="nav-item col-lg-2">
				<?= anchor("UserController/listCar", "Nos véhicules",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
			</li>

			<li class="nav-item col offset-sm-5">
				<?= anchor("UserController/index", "Liste Location",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
			</li>

			<li class="nav-item col">
				<?= anchor("UserController/profil", "Option",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
			</li>

			<li class="nav-item col">
				<?= anchor("UserController/signout", "Déconnexion",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
			</li>
			<?php}if($_SESSION['admin'] == 1){?>

			<li class="nav-item col-lg-2">
				<?= anchor("UserController/listCar", "Infos véhicules",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
			</li>

			<li class="nav-item col-lg-2">
				<?= anchor("UserController/listCar", "Infos clients",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
			</li>

			
			<li class="nav-item col-lg-2">
				<?= anchor("UserController/listCar", "Liste locations",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
			</li>

			<li class="nav-item offset-sm-1">
				<h2>Admin Mode</h2>
			</li>

			<li class="nav-item col">
				<?= anchor("AdminController/profil", "Option",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
			</li>

			<li class="nav-item col">
				<?= anchor("AdminController/signout", "Déconnexion",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
			</li>

			<?php } else { ?>
			<li class="nav-item col-lg-2">
				<?= anchor("UserController/listCar", "Nos véhicules",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
			</li>

			<li class="nav-item col offset-sm-6">
				<?= anchor("UserController/login", "Inscription/Login",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
			</li>
			<?php } ?>

	    </ul>
</div>
</nav>
<div id="hrbar" class="col-12"></div>