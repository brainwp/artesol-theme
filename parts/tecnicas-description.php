<?php
/* Tecnicas description */
$term = get_term_by('slug', $_GET['filter_type'], 'tipos');
?>
<div class="col-md-12">
	<div class="container container-tipologia">
		<div class="row">
			<header class="entry-header">
			<h1 class="entry-title"><?php echo $term->name;?></h1>
			</header>
			<div class="entry-content">
			<p><?php echo $term->description;?></p>
			</div>
		</div>
	</div>
</div><!-- .col-md-12 -->
