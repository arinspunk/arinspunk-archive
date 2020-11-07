<?php

// ============================================================
// PART-INVITATION.PHP
// ------------------------------------------------------------
// Bloco final da home e categorias
// ============================================================

?>
		<section class="invitation">
			<div class="main-container">
				<div class="container flex-right">
					<div class="item item--col-6">
						<div class="invitation__text">
							<?php if(is_home()): ?>
								<?php _e('17 anos','ak') ?> ->
								<?php
									$categories = get_categories();
									$i = 1; foreach ( $categories as $category ) :
										$category_link = get_category_link( $category->term_id );
										$category_name = $category->name;
								?>
									<?php echo $category->count ?> <a href="<?php echo $category_link; ?>" title="<?php echo $category->name; ?>"><?php echo strtolower($category_name); ?></a><?php if($i==1): ?><?php _e(' e ','ak') ?><?php elseif ($i==2): ?>.<?php endif; ?>
								<?php $i++; endforeach; ?>
							<?php elseif(is_category()):
								$current_cat = get_queried_object();
								$category_id = $current_cat->term_id;
								$categories  = get_categories(array('exclude'=>$category_id));
							?>
								<?php _e('Tamém temos ','ak') ?>
								<?php foreach ( $categories as $category ) :
									$category_name = $category->name;
									$category_link = get_category_link( $category->term_id );
								?>
									<?php echo $category->count; ?> <a href="<?php echo $category_link; ?>"><?php echo strtolower($category_name); ?></a>.
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>