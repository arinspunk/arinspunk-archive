		<section class="work">
			<?php foreach(get_tags(array('order' => 'DESC')) as $term): ?>
	            <?php
	            $category = get_queried_object();
	            if(is_home()) :
		            $args  = array(
		            	'posts_per_page' => -1,
		            	'post_type' 	 => 'post',
		            	'orderby' => 'title',
		            	'tag__in'        => $term->term_id,
		            );
		        else:
		        	$args  = array(
		            	'posts_per_page' => -1,
		            	'post_type' 	 => 'post',
		            	'orderby' => 'title',
		            	'tag__in'        => $term->term_id,
		            	'category'		 => $category->term_id,
		            );
		        endif;
	            $posts = get_posts($args); ?>
	            <?php if($posts) : ?>
	            	<div class="container">
						<div class="item">
							<h2>
								<?php echo $term->name; ?>
							</h2>
						</div>
						<div class="work__list">
			                <?php foreach($posts as $post) : ?>
			                <?php setup_postdata($post);
			                	$size    = 'col2';
			                	$width   = '720px';
			                	$img_url = get_the_post_thumbnail_url(get_the_ID(),$size);
							    $img_id  = get_post_thumbnail_id(); 
							    $alt 	 = get_post_meta($img_id, '_wp_attachment_image_alt', true);
							    $srcset  = wp_get_attachment_image_srcset($img_id,$size);
							    $unused  = get_field('unused');
							    $border  = get_field('image_border_home');
			                ?>
		                    	<article class="work__list-item">
		                    		<a href="<?php the_permalink(); ?>">
										<img src="<?php echo esc_url($img_url); ?>" srcset="<?php echo $srcset; ?>" sizes="(max-width: <?php echo $width; ?>) 100vw, <?php echo $width; ?>" alt="<?php echo $alt; ?>" loading="lazy" class="<?php if($border): ?>img-border<?php endif; ?>" />
										<h3 class="<?php if($unused): echo "unused"; endif; ?>">
											<?php the_title(); ?>
											<?php if($unused): _e('(rejeitado)','themefront'); endif; ?>
										</h3>
									</a>
								</article>
			                 <?php endforeach; ?>
	                		<?php wp_reset_postdata(); ?>
	                	</div>
	                </div>
	            <?php endif; ?>
	        <?php endforeach; ?>
		</section>

		
	