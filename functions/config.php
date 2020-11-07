<?php
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// CONFIGURACIÓN WP
// Aquí añadimos nuestras propias funciones de Wordpress
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// CAMBIAR mensaje de error del login
// Así evitamos dar pistas a los malos
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function login_errors_message() {
    return __('Ui, algo fizeste mal…','ak');
}
add_filter('login_errors', 'login_errors_message');


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ELIMINAR “basura” del <head>
// (Versión de WordPress, RSD, Windows Live Writter, etc.)
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// AÑADIR SVG
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function my_upload_mimes($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'my_upload_mimes');


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Permitir a la plantilla leer las traducciones
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

load_theme_textdomain( 'themefront', get_template_directory().'/languages' );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Forzar "Imagen Destacada". Desaparece cuando instalamos ACF Pro
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

add_theme_support( 'post-thumbnails' );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Añadir nuevos menús a la plantilla
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function registrar_mis_menus()
{
	register_nav_menus(
		array(
			'main' 	 => __('Menu Principal','ak'),
			'footer' => __('Footer','ak')
			// Añade aquí más menús
		)
	);
}
add_action( 'init', 'registrar_mis_menus' );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Cargas async y defer de enqueues
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function add_defer_attribute( $tag, $handle )
{
	// add script handles to the array below
	$scripts_to_defer = array('slick','form_validation', 'form_validation_bootstrap', 'form_validation_es', 'form-contacto');
	
	foreach($scripts_to_defer as $defer_script) {
		if ($defer_script === $handle) {
			return str_replace(' src', ' defer src', $tag);
		}
	}
	return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

function add_async_attribute( $tag, $handle )
{
	// add script handles to the array below
	$scripts_to_async = array();
	
	foreach($scripts_to_async as $async_script) {
		if ($async_script === $handle) {
			return str_replace(' src', ' async src', $tag);
		}
	}
	return $tag;
}
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);


/* Add custom classes to list item "li" */
function _namespace_menu_item_class( $classes, $item ) {       
    $classes[] = "header__menu-item"; // you can add multiple classes here
	if (in_array('current-menu-item', $classes) ){
	    $classes[] = 'header__menu-item--active ';
	}
    return $classes;
} 
add_filter( 'nav_menu_css_class' , '_namespace_menu_item_class' , 10, 2 );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Crear tamaños de imagen
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

// completely disable image size threshold
add_filter( 'big_image_size_threshold', '__return_false' ); 

// remove default images
add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
function prefix_remove_default_images( $sizes )
{
	unset( $sizes['thumbnail']); // 150px
	unset( $sizes['medium']); // 300px
	unset( $sizes['medium_large']); // 768px
	unset( $sizes['large']); // 1024px
	return $sizes;
}

// add new sizes
add_image_size( 'col4_x2', 2952 ); // 2952 x 4176 px
add_image_size( 'col3_x2', 2196 ); // 2196 x 3108 px
add_image_size( 'col4', 1476 ); // 1476 x 2088 px
add_image_size( 'col3', 1098 ); // 1098 x 1554 px
add_image_size( 'col2', 720 ); // 720 x 1020 px
add_image_size( 'col1', 342 ); // 342 x 486 px

add_filter( 'image_size_names_choose', 'custom_image_sizes' );
function custom_image_sizes( $sizes )
{
    return array_merge($sizes, array(
        'col4_x2' => __('4 colunas retina','ak'),
    	'col3_x2' => __('3 colunas retina','ak'),
    	'col4' 	  => __('4 colunas','ak'),
    	'col3' 	  => __('3 colunas','ak'),
    	'col2'    => __('2 colunas','ak'),
    	'col1'    => __('1 colunas','ak')
    ));
}

// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Responsive Image Helper Function (ACF)
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
/**
 * @link https://www.awesomeacf.com/responsive-images-wordpress-acf/
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute 
 */
function acf_responsive_image($image_id,$image_size,$max_width){
	// check the image ID is not blank
	if($image_id != '') {
		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );
		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
		// generate the markup for the responsive image
		//echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';
		echo 'srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';
	}
}
add_filter( 'max_srcset_image_width', 'awesome_acf_max_srcset_image_width', 10 , 2 );
// set the max image width 
function awesome_acf_max_srcset_image_width() {
	return 2952;
}


// This is the end...
// My only friend,
// The end!!
?>