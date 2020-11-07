<?php

// =============================================================================
// ARCHIVE.PHP
// -----------------------------------------------------------------------------
// Plantilla base para la página de categoría
// =============================================================================

?>

<?php get_header(); ?>

	<div class="main-container">

		<?php get_template_part( '/partials/part', 'info' ) ?>

		<?php get_template_part( '/partials/part', 'loop' ) ?>

	</div>

	<?php get_template_part( '/partials/part', 'invitation' ) ?>

<?php get_footer(); ?>