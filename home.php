<?php

// ======================================
// HOME.PHP
// --------------------------------------
// Plantilla base para el inicio del blog
// ======================================

?>

<?php get_header(); ?>
	
	<div class="main-container">

		<?php get_template_part( '/partials/part', 'info' ) ?>

		<?php get_template_part( '/partials/part', 'loop' ) ?>

	</div>

	<?php get_template_part( '/partials/part', 'invitation' ) ?>

<?php get_footer(); ?>