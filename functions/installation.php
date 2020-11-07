<?php
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// INSTALACIÓN
// Lo básico para arrancar
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Incluir la función is_login_page() para poder encolar el css de la página de login sólo en la página de login (con if/else)
// Fuente: http://wordpress.stackexchange.com/questions/28095/how-can-i-tell-if-im-on-a-login-page
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function is_login_page()
{
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Función personalizada que permite hacer el excerpt del tamaño que se desee*/
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function custom_excerpt($new_length = 20, $new_more = '...') 
{
	add_filter('excerpt_length', function () use ($new_length) 
	{
		return $new_length;
	}, 999);
	add_filter('excerpt_more', function () use ($new_more)
	{
		return $new_more;
	});
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p>' . $output . '</p>';
	echo $output;
}

function custom_excerpt_characters() 
{
	$excerpt = get_the_excerpt();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 200);
	//$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt . '...';
	echo $excerpt;
}


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Páginas de opciones globales para ACF
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

if ( function_exists('acf_add_options_page') )
{
	acf_add_options_page(array(
		'page_title' 	=> 'Opciones Globales',
		'menu_title'	=> 'Opciones Globales',
		'menu_slug' 	=> 'opciones-globales',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// WOOCOMMERCE SUPPORT (imprescindible para que funcione Woocommerce en nuestra flamante plantilla)
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

// 1. Unhook the WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// 2. Hook to display the wrappers your theme requires
function my_theme_wrapper_start()
{
  echo '<div id="main" class="main">';
}
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);

function my_theme_wrapper_end()
{
  echo '</div>';
}
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

// 3. Declare WooCommerce support
function woocommerce_support()
{
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );


// This is the end...
// My only friend,
// The end!!
?>