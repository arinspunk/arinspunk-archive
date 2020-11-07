<?php

// =====================================================================================
// HEADER.PHP
// -------------------------------------------------------------------------------------
// Plantilla base para el <head> y apertura del <body> (<header>)
// =====================================================================================

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title(''); ?><?php if ( wp_title( '', false ) ) echo ' :'; ?> <?php bloginfo('name'); ?></title>

        <?php // FAVICONS https://realfavicongenerator.net/ ?>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/_/img/icons/apple-touch-icon.png" />
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/_/img/icons/favicon-32x32.png" />
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/_/img/icons/favicon-16x16.png" />
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/_/img/icons/manifest.json" />
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/_/img/icons/safari-pinned-tab.svg" color="#f11926" />
		<meta name="theme-color" content="#f11926" />

		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#f11926" />
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#f11926" />
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
		<link rel="canonical" href="<?php echo get_permalink(); ?>" />
		<meta name="robots" content="index,follow" />

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<header class="header" role="banner">
			<div class="main-container">
				<div class="container">
					<div class="item item--col-6">
						<nav aria-label="breadcrumb">
							<ol class="header__breadcrumb">
								<?php
									$a = array('A', 'a', '@', '^');
									$r = array('R', 'r', '®');
									$i = array('I', 'i', '¡', ':');
									$n = array('N', 'n', '~');
									$s = array('S', 's', '$');
									$p = array('P', 'p');
									$u = array('U', 'u', 'v');
									$k = array('K', 'k');
									$arinspunk = $a[array_rand($a)].$r[array_rand($r)].$i[array_rand($i)].$n[array_rand($n)].$s[array_rand($s)].$p[array_rand($p)].$u[array_rand($u)].$n[array_rand($n)].$k[array_rand($k)];
								?>
								<?php if(is_home()): ?>
									<li class="header__breadcrumb-item header__breadcrumb-item--active" aria-current="page">
										<span class="logo">
											<?php echo $arinspunk; ?>
										</span>
									</li>
								<?php elseif(is_category()): ?>
									<li class="header__breadcrumb-item">
										<a href="<?php echo esc_url(home_url('/')); ?>"><span class="logo"><?php echo $arinspunk; ?></span></a>
									</li>
									<li class="header__breadcrumb-item header__breadcrumb-item--active" aria-current="page">
										<?php single_cat_title(); ?>
									</li>
								<?php elseif(is_single()): ?>
									<li class="header__breadcrumb-item">
										<a href="<?php echo esc_url(home_url('/')); ?>"><span class="logo"><?php echo $arinspunk; ?></span></a>
									</li>
									<li class="header__breadcrumb-item">
										<?php the_category( ', ' ); ?>
									</li>
									<li class="header__breadcrumb-item header__breadcrumb-item--active" aria-current="page">
										<?php
											$unused = get_field('unused');
											the_title(); if($unused): echo '&nbsp;'; _e('(rejeitado)','themefront'); endif;
										?> 
									</li>
								<?php endif; ?>
							</ol>
						</nav>
					</div>
					<div class="item item--col-6">
						<?php
							if (!is_single()) :
								wp_nav_menu( array( 'theme_location' => 'main', 'menu_class' => 'header__menu', 'li_class'  => 'header__menu-item'  ) );
							else: ?>
								<nav>
									<ul class="header__arrows">
										<li class="header__arrow">
											<?php
												$prev_post = get_previous_post();
												$icono 	   = '<-';
												if($prev_post):
													$prev_post_title = apply_filters('the_title', $prev_post->post_title);
													echo '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="'.$prev_post_title.'">'.$icono.'</a>';
												else: ?>
													<span><-</span>
												<?php endif;
											?>
										</li>
										<li class="header__arrow">
											<?php
												$next_post = get_next_post();
												$icono 	   = '->';
												if($next_post):
													$next_post_title = apply_filters('the_title', $next_post->post_title);
													echo '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="'.$next_post_title.'">'.$icono.'</a>';
												else: ?>
													<span>-></span>
												<?php endif;
											?>
										</li>
									</ul>
								</nav>
							<?php endif;
						?>
					</div>
				</div>
			</div>
		</header>