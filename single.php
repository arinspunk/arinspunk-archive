<?php

// =============================================================================
// SINGLE.PHP
// -----------------------------------------------------------------------------
// Plantilla base para los post
// =============================================================================

?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article>
		<div class="main-container">

			<?php posts_nav_link(); ?>

			<?php get_template_part( '/partials/part', 'info' ) ?>

			<section class="content">

				<?php if( have_rows('rows') ): ?>
					<?php while( have_rows('rows') ): the_row(); ?>
						<div class="container">

							<?php if( have_rows('columns') ): ?>
							    <?php while( have_rows('columns') ): the_row(); ?>
							        <?php
							        // COL 1 - - - - - - - - - - - - - - - - - - - - - - - 
							        if( get_row_layout() == 'col_1' ):
							        	$size           	= 'col2';
							        	$max_width      	= '720px';
							        	$image          	= get_sub_field('image');
							        	$image_id       	= $image['id'];
							        	$image_border   	= get_sub_field('image_border');
							        	$caption        	= get_sub_field('caption');
							        	$image_hover    	= get_sub_field('image_hover');
							        	$image_hover_id     = $image_hover['id'];
							        	$image_hover_border = get_sub_field('image_hover_border');
							        	$caption_hover      = get_sub_field('caption_hover');
							        	$text           	= get_sub_field('text');
							        ?>
							            <div class="item">
											<?php if ($image): ?>
												<figure>
													<img src="<?php echo $image['sizes']['col1'] ?>" <?php acf_responsive_image($image_id,$size,$max_width); ?> alt="<?php echo $image['alt']; ?>" loading="lazy" class="<?php if($image_border): ?>img-border<?php endif; ?>" /> 
													<?php if ($caption): ?>
														<figcaption>
															<?php echo $caption; ?>
														</figcaption>
													<?php endif; ?>
												</figure>
											<?php endif; ?>
											<?php if ($image_hover): ?>
												<figure class="figure-hover">
													<img src="<?php echo $image_hover['sizes']['col1'] ?>" <?php acf_responsive_image($image_hover_id,$size,$max_width); ?> alt="<?php echo $image_hover['alt']; ?>" loading="lazy" class="<?php if($image_hover_border): ?>img-border<?php endif; ?>" /> 
													<?php if ($caption_hover): ?>
														<figcaption>
															<?php echo $caption_hover; ?>
														</figcaption>
													<?php endif; ?>
												</figure>
											<?php endif; ?>
											<?php if ($text): ?>
												<?php echo $text; ?>
											<?php endif; ?>
										</div>
									<?php
									// COL 1 EMPTY - - - - - - - - - - - - - - - - - - - - 
									elseif( get_row_layout() == 'col_1_empty' ): ?>
							            <div class="item item--empty"></div>
							        <?php
							        // COL 2 - - - - - - - - - - - - - - - - - - - - - - - 
							    	elseif( get_row_layout() == 'col_2' ):
							        	$size           	= 'col4';
							        	$max_width      	= '1476px';
							        	$image          	= get_sub_field('image_2');
							        	$image_id       	= $image['id'];
							        	$image_border   	= get_sub_field('image_border_2');
							        	$caption        	= get_sub_field('caption_2');
							        	$image_hover    	= get_sub_field('image_hover_2');
							        	$image_hover_id 	= $image_hover['id'];
							        	$image_hover_border = get_sub_field('image_hover_border_2');					
							        	$caption_hover      = get_sub_field('caption_hover_2');
							        	$text           	= get_sub_field('text_2');
							        ?>
							        	<div class="item item--col-6">
											<?php if ($image): ?>
												<figure>
													<img src="<?php echo $image['sizes']['col2'] ?>" <?php acf_responsive_image($image_id,$size,$max_width); ?> alt="<?php echo $image['alt']; ?>" loading="lazy" class="<?php if($image_border): ?>img-border<?php endif; ?>" class="<?php if($image_border): ?>img-border<?php endif; ?>" /> 
													<?php if ($caption): ?>
														<figcaption>
															<?php echo $caption; ?>
														</figcaption>
													<?php endif; ?>
												</figure>
											<?php endif; ?>
											<?php if ($image_hover): ?>
												<figure class="figure-hover">
													<img src="<?php echo $image_hover['sizes']['col1'] ?>" <?php acf_responsive_image($image_hover_id,$size,$max_width); ?> alt="<?php echo $image_hover['alt']; ?>" loading="lazy" class="<?php if($image_hover_border): ?>img-border<?php endif; ?>" /> 
													<?php if ($caption_hover): ?>
														<figcaption>
															<?php echo $caption_hover; ?>
														</figcaption>
													<?php endif; ?>
												</figure>
											<?php endif; ?>
											<?php if ($text): ?>
												<?php echo $text; ?>
											<?php endif; ?>
										</div>
									<?php
									// COL 2 EMPTY - - - - - - - - - - - - - - - - - - - -
									elseif( get_row_layout() == 'col_2_empty' ): ?>
							            <div class="item item--col-6 item--empty"></div>
							        <?php
							        // COL 3 - - - - - - - - - - - - - - - - - - - - - - -
							    	elseif( get_row_layout() == 'col_3' ):
							        	$size           	= 'col3_x2';
							        	$max_width      	= '2196px';
							        	$image          	= get_sub_field('image_3');
							        	$image_id       	= $image['id'];
							        	$image_border   	= get_sub_field('image_border_3');
							        	$caption        	= get_sub_field('caption_3');
							        	$image_hover    	= get_sub_field('image_hover_3');
							        	$image_hover_id 	= $image_hover['id'];
							        	$image_hover_border = get_sub_field('image_hover_border_3');
							        	$caption_hover      = get_sub_field('caption_hover_3');
							        	$text           	= get_sub_field('text_3');
							        ?>
							        	<div class="item item--col-9">
											<?php if ($image): ?>
												<figure>
													<img src="<?php echo $image['sizes']['col3'] ?>" <?php acf_responsive_image($image_id,$size,$max_width); ?> alt="<?php echo $image['alt']; ?>" loading="lazy" class="<?php if($image_border): ?>img-border<?php endif; ?>" /> 
													<?php if ($caption): ?>
														<figcaption>
															<?php echo $caption; ?>
														</figcaption>
													<?php endif; ?>
												</figure>
											<?php endif; ?>
											<?php if ($image_hover): ?>
												<figure class="figure-hover">
													<img src="<?php echo $image_hover['sizes']['col1'] ?>" <?php acf_responsive_image($image_hover_id,$size,$max_width); ?> alt="<?php echo $image_hover['alt']; ?>" loading="lazy" class="<?php if($image_hover_border): ?>img-border<?php endif; ?>" /> 
													<?php if ($caption_hover): ?>
														<figcaption>
															<?php echo $caption_hover; ?>
														</figcaption>
													<?php endif; ?>
												</figure>
											<?php endif; ?>
											<?php if ($text): ?>
												<?php echo $text; ?>
											<?php endif; ?>
										</div>
									<?php
									// COL 3 EMPTY - - - - - - - - - - - - - - - - - - - -
									elseif( get_row_layout() == 'col_3_empty' ): ?>
							            <div class="item item--col-9 item--empty"></div>
							        <?php
							        // COL 4 - - - - - - - - - - - - - - - - - - - - - - -
							    	elseif( get_row_layout() == 'col_4' ):
							        	$size           	= 'col4_x2';
							        	$max_width      	= '2952px';
							        	$image          	= get_sub_field('image_4');
							        	$image_id       	= $image['id'];
							        	$image_border 		= get_sub_field('image_border_4');
							        	$caption        	= get_sub_field('caption_4');
							        	$image_hover    	= get_sub_field('image_hover_4');
							        	$image_hover_id 	= $image_hover['id'];
							        	$image_hover_border = get_sub_field('image_hover_border_4');
							        	$caption_hover      = get_sub_field('caption_hover_4');
							        	$text           	= get_sub_field('text_4');
							        ?>
							           <div class="item item--col-12">
											<?php if ($image): ?>
												<figure>
													<img src="<?php echo $image['sizes']['col4'] ?>" <?php acf_responsive_image($image_id,$size,$max_width); ?> alt="<?php echo $image['alt']; ?>" loading="lazy" class="<?php if($image_border): ?>img-border<?php endif; ?>" /> 
													<?php if ($caption): ?>
														<figcaption>
															<?php echo $caption; ?>
														</figcaption>
													<?php endif; ?>
												</figure>
											<?php endif; ?>
											<?php if ($image_hover): ?>
												<figure class="figure-hover">
													<img src="<?php echo $image_hover['sizes']['col1'] ?>" <?php acf_responsive_image($image_hover_id,$size,$max_width); ?> alt="<?php echo $image_hover['alt']; ?>" loading="lazy" class="<?php if($image_hover_border): ?>img-border<?php endif; ?>" /> 
													<?php if ($caption_hover): ?>
														<figcaption>
															<?php echo $caption_hover; ?>
														</figcaption>
													<?php endif; ?>
												</figure>
											<?php endif; ?>
											<?php if ($text): ?>
												<?php echo $text; ?>
											<?php endif; ?>
										</div>
							        <?php endif; ?>
							    <?php endwhile; ?>
							<?php endif; ?>

						</div>
					<?php endwhile; ?>
				<?php endif; ?>

			</section>
			
		</div>
	</article>

	<?php get_template_part( '/partials/part', 'related' ) ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>