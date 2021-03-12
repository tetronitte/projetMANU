<div class="container-fluid">
	<?= form_open('USerController/listUser'); ?>
		<div class="form-group input-group">
			<div  id="searchClientDiv" class="input-group-prepend">
				<input type="text" id="searchClient" name="searchClient" class="form-control" value="<?php if(isset($search)) {echo $search;} else if(isset($this->session->search)) { echo $this->session->search; unset($this->session->search);} ?>">
				<?= form_submit("send", "chercher",['class' => 'btn btn-warning', 'id' => 'searchClientButton']); ?>
			</div>
		</div>
	<?= form_close() ?>

	<div id="listAllClient" class="row">
		<div id="hrbar" class="col-12"></div>
			<?php 
				var_dump($search);
				var_dump($users);
				if(isset($this->session->errorDeleteUser)) var_dump($this->session->errorDeleteUser);
			?>
	</div>

	<!-- PAGINATION -->
	<?php
        if ($count > 0 && ($count/10) > 1) {
            $nb = $count/10;
            echo '<div class="pagination">';
            for ($i = 0 ; $i < $nb ; $i++) {
                echo '<button class="page" id="page'.($i+1).'">'.($i+1).'</button>';
            }
            echo '</div>';
        }
    ?>
</div>