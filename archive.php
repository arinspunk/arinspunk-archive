<?php

// =============================================================================
// ARCHIVE.PHP
// -----------------------------------------------------------------------------
// Plantilla base para la página de archivos (Categorías, Tags, Búquedas, etc.)
// =============================================================================

?>

<?php get_header(); ?>

	<div class="main-container">

		<?php get_template_part( '/partials/part', 'info' ) ?>

		<?php get_template_part( '/partials/part', 'loop' ) ?>

	</div>

<?php get_footer(); ?>