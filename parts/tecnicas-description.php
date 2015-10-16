<?php
/* Tecnicas description */
$term = get_term_by('slug', $_GET['filter_type'], 'tipos');
?>
<div class="col-md-12">
	<?php echo $term->name;?>
	<?php echo $term->description;?>
</div><!-- .col-md-12 -->
