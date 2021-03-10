
<div class="container-fluid text-center position-fixed fixed-bottom" id="cookie">
	<div class="row">
	<div id="hrbar" class="col-12"></div>
		<h3 class="col-12">Le respect de votre vie privée est notre priorité</h3>
		<p class="col-8 text-left">En poursuivant votre navigation, vous acceptez l'utilisation, de la part du Groupe Loca-Auto (Digital quelquechose France) et de ses partenaires,
			de cookies et autres traceurs servant à mesurer l'audience, à comprendre votre navigation,
			à vous proposer des offres et publicités adaptées à votre profil et à partager sur les réseaux sociaux.</p>
		<?= anchor("'url'", "accepter",['class' => 'btn btn-warning col-2', 'id' => 'yesCookie']); ?>
		<?= anchor("'url'", "refuser",['class' => 'btn btn-warning col-2', 'id' => 'noCookie']); ?>
	</div>
</div>