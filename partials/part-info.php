<?php

// ============================================================
// PART-INFO.PHP
// ------------------------------------------------------------
// Bloco incial da home, categorias e singles 
// ============================================================

?>

		<div class="info">
			<div class="container">
				<div class="item item--col-6">
					<h1 class="info__title">
						<?php
							if(is_home()):
								the_field('home_title','option');
							elseif(is_category()):
								single_cat_title();
							elseif(is_404()):
								_e('Erro 404…','ak');
							else:
								$unused = get_field('unused');
								the_title(); if($unused): echo '&nbsp;<span>'; _e('(rejeitado)','themefront'); echo '</span>'; endif;
							endif;
						?>
					</h1>
				</div>
			</div>
			<div class="container">
				<div class="item item--col-6 info__text">
					<?php
						if(is_home()):
							the_field('home_description','option');
						elseif(is_category()):
							the_archive_description();
						elseif(is_single()):
							the_field('text');
						elseif(is_404()):
							echo sprintf( __( 'Aonde é que vas? volta para a <a href="%s">casa</a> ;)', 'ak' ), esc_url(home_url('/')) );
						endif;
					?>
				</div>
				<div class="item item--col-3">
					<?php if(is_home()): ?>
						<ul class="info__list">
							<?php
								$categories = get_categories();
								foreach ( $categories as $category ) :
									$category_link = get_category_link( $category->term_id );
									$category_name = $category->name;
							?>
								<li>
									<?php echo $category->count ?> <a href="<?php echo $category_link; ?>" title="<?php echo $category->name; ?>"><?php echo strtolower($category_name); ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php elseif(is_category()):
						$category = get_queried_object();
						$category_name = $category->name;
					?>
						<ul class="info__list">
							<li>
								<?php echo $category->count; ?> <?php echo strtolower($category_name); ?>
							</li>
						</ul>
					<?php elseif(is_single()): ?>
						<?php if( have_rows('list') ): ?>
							<ul class="info__list">
								<li>
									<?php _e('Ano','themefront') ?>:
									<?php
										$posttags = get_the_tags();
										if ($posttags):
											foreach($posttags as $tag):
												echo ' '.$tag->name;
											endforeach;
										endif;
									?>
								</li>
							 	<?php while ( have_rows('list') ) : the_row(); ?>
							 		<?php if( have_rows('item') ): ?>
									    <?php while( have_rows('item') ): the_row(); ?>
									        <?php if( get_row_layout() == 'client' ): ?>
									        	<li>
										        	<?php _e('Cliente','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
									        <?php elseif( get_row_layout() == 'label' ): ?>
									        	<li>
										        	<?php _e('Editora','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
									        <?php elseif( get_row_layout() == 'format' ): ?>
									        	<li>
										        	<?php _e('Formato','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
										    <?php elseif( get_row_layout() == 'print' ): ?>
									        	<li>
										        	<?php _e('Impressom','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
									        <?php elseif( get_row_layout() == 'box' ): ?>
									        	<li>
										        	<?php _e('Caixa','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
									        <?php elseif( get_row_layout() == 'book' ): ?>
									        	<li>
										        	<?php _e('Livro','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
									        <?php elseif( get_row_layout() == 'cd' ): ?>
									        	<li>
										        	<?php _e('CD','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
									        <?php elseif( get_row_layout() == 'vinyl' ): ?>
									        	<li>
										        	<?php _e('Vinil','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
									        <?php elseif( get_row_layout() == 'labels' ): ?>
									        	<li>
										        	<?php _e('Lapelas','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
									        <?php elseif( get_row_layout() == 'types' ): ?>
									        	<li>
										        	<?php _e('Tipos','ak') ?>: <?php the_sub_field('text') ?>
										        </li>
									        <?php endif; ?>
									    <?php endwhile; ?>
									<?php endif; ?>
							    <?php endwhile; ?>
							</ul>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>