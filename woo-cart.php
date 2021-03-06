<?php

// =============================================================================
// TEMPLATE NAME: Carrito
// -----------------------------------------------------------------------------
// Tamplate para la página "Cart" (WooCommerce)
// =============================================================================

?>

<?php get_header(); ?>
	
	<div id="main" class="main">
		<div class="container">
			
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<h1><?php the_title(); // título ?></h1>
			<?php the_content(); ?>

		<?php endwhile; endif; ?>
		
		</div>
	</div>

<?php get_footer(); ?>