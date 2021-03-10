<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse row" id="navbarNav"><!-- modifier col pour le responsive et faire du php pour if loggedin remplacer le bouton login -->
		<ul class="navbar-nav col-12">
			<li class="nav-item col-lg-2">
				<?= anchor("'url'", "Nos véhicules",['class' => 'btn nav-link', 'id' => 'linkVehicle']); ?>
			</li>
			<li class="nav-item col offset-lg-6">
				<?= anchor("'url'", "Inscription/Login",['class' => 'btn btn-warning nav-link', 'id' => 'loginbutton']); ?>
			</li>
	    </ul>
</div>
</nav>
<hr>