<?php

// ============================================================
// PART-RELATED.PHP
// ------------------------------------------------------------
// Bloco final do single
// ============================================================

?>
		<?php if( have_rows('related_works') ): ?>
			<section class="work work--related">
				<div class="main-container">
					<div class="container">
						<div class="item">
							<h2>
								<?php _e('Relacionados','themefront') ?>
							</h2>
						</div>
						<div class="work__list">
							<?php while( have_rows('related_works') ): the_row();
								$post_object = get_sub_field('work');
								$border  	 = get_sub_field('border');
								if( $post_object ):
							        $post = $post_object;
							        setup_postdata($post);
							    endif;
							    $size    = 'col2';
							    $width   = '720px';
							    $img_url = get_the_post_thumbnail_url(get_the_ID(),$size);
							    $img_id  = get_post_thumbnail_id(); 
							    $alt 	 = get_post_meta($img_id, '_wp_attachment_image_alt', true);
							    $srcset  = wp_get_attachment_image_srcset($img_id,$size);
							    $unused = get_field('unused');
							?>
								<article class="work__list-item">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo esc_url($img_url); ?>" srcset="<?php echo $srcset; ?>" sizes="(max-width: <?php echo $width; ?>) 100vw, <?php echo $width; ?>" alt="<?php echo $alt; ?>" loading="lazy" class="<?php if($border): ?>img-border img-border--negative<?php endif; ?>" />
										<h3 class="<?php if($unused): echo "unused"; endif; ?>">
											<?php the_title(); ?>
											<?php if($unused): _e('(rejeitado)','themefront'); endif; ?>
										</h3>
									</a>
								</article>
								<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>