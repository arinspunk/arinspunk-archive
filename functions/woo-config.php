<?php
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// CONFIGURACIÓN WOOCOMMERCE
// Aquí añadimos nuestras propias funciones de Woocommerce
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ELIMINAR las "Wocommerce Tabs": description, reviews y additional information
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	       // Remove the description tab
    unset( $tabs['reviews'] ); 			           // Remove the reviews tab
    unset( $tabs['additional_information'] );      // Remove the additional information tab

    return $tabs;
}

// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// CAMBIAR/ELIMINAR campos de los formularios
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// CAMBIAR (Our hooked in function - $fields is passed via the filter!)
function custom_override_checkout_fields( $fields ) {

	// CAMBIAR
    $fields['billing']['billing_first_name']['placeholder'] = 'Nombre';
    $fields['billing']['billing_last_name']['placeholder'] = 'Apellidos';
    $fields['billing']['billing_address_1']['placeholder'] = 'Dirección';
	$fields['billing']['billing_city']['placeholder'] = 'Ciudad';
	$fields['billing']['billing_postcode']['placeholder'] = 'Código Postal';
	$fields['billing']['billing_country']['placeholder'] = 'País';
    $fields['billing']['billing_state']['placeholder'] = 'Selecciona tu provincia';
    $fields['billing']['billing_email']['placeholder'] = 'Email';
    $fields['billing']['billing_phone']['placeholder'] = 'Teléfono';

    $fields['shipping']['shipping_first_name']['placeholder'] = 'Nombre';
    $fields['shipping']['shipping_last_name']['placeholder'] = 'Apellidos';
    $fields['shipping']['shipping_address_1']['placeholder'] = 'Dirección';
	$fields['shipping']['shipping_city']['placeholder'] = 'Ciudad';
	$fields['shipping']['shipping_postcode']['placeholder'] = 'Código Postal';
	$fields['shipping']['shipping_country']['placeholder'] = 'País';
    $fields['shipping']['shipping_state']['placeholder'] = 'Selecciona tu provincia';
    $fields['shipping']['shipping_email']['placeholder'] = 'Email';
    $fields['shipping']['shipping_phone']['placeholder'] = 'Teléfono';

    // ELIMINAR
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_2']);

	unset($fields['shipping']['shipping_company']);
	unset($fields['shipping']['shipping_address_2']);

    // AÑADIR
    $fields['billing']['shipping_date'] = array(
        'class'     => array('form-row-wide'),
        'clear'     => true,
        'label'     => __('Fecha de nacimiento', 'woocommerce'),
        'placeholder'   => _x('Fecha de nacimiento (dd/mm/aaaa)', 'placeholder', 'woocommerce'),
        'required'  => false
     );

    return $fields;
}

// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ELIMINAR todos los <label> de los formularios
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

// WooCommerce Checkout Fields Hook
// Our hooked in function - $fields is passed via the filter!
// Action: remove label from $fields
function custom_wc_checkout_fields_no_label($fields) {
    // loop by category
    foreach ($fields as $category => $value) {
        // loop by fields
        foreach ($fields[$category] as $field => $property) {
            // remove label property
            unset($fields[$category][$field]['label']);
        }
    }
    return $fields;
}
add_filter('woocommerce_checkout_fields','custom_wc_checkout_fields_no_label');


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// MENU Login/Register
// Fuente: http://www.themelocation.com/how-to-add-loginlogout-links-to-menu-in-woocommerce/
// Para que funcione hay que:
//     1. Registar un nuevo menú ('login') en la plantilla (/functions/installation.php) -> 'login' => __( 'Login' )
//     2. Crear un menú en el gestor de contindos y asignarlo a nuestra nueva localización 'Login' 
//     3. Cambiar url de las imágenes (iconos)
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function add_loginout_link( $items, $args ) {

   if (is_user_logged_in() && $args->theme_location == 'login') {

        $current_user = wp_get_current_user();
        $NamUsuarios =   $current_user->display_name ;
        $items .= '<li class="acceso"> <a href="' . get_permalink( woocommerce_get_page_id( 'myaccount' ) ) . '">'.sprintf(__( '%1$s', 'woocommerce' ) . ' ',
        $current_user->display_name,
        wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) )
        ).'</a> <a class="salir" href="'. wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ) .'" title="Salir"><img src="' . get_template_directory_uri() . '/img/noumad_icono_salir.svg" /></i></a></li>';
        
   }

   elseif (!is_user_logged_in() && $args->theme_location == 'login') {

       $items .= '<li><a href="' . get_permalink( woocommerce_get_page_id( 'myaccount' ) ) . '"><img src="' . get_template_directory_uri() . '/img/noumad_icono_usuario.svg" /></a></li>';

   }

   return $items;

}
add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// CAMBIAR texto del botón de Añadir (Single Product)
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function woo_custom_cart_button_text() {
    return __( 'Añadir a la cesta', 'woocommerce' );
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// CAMBIAR el número de productos mostrados por página
// @link https://docs.woocommerce.com/document/change-number-of-products-displayed-per-page/
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 15;
  return $cols;
}


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// VER TODOS LOS PRODUCTOS
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function wg_view_all_products(){
	
	if ( $_GET['view'] === 'all' ) {
		return '9999';
	}
	
}
add_filter('loop_shop_per_page', 'wg_view_all_products', 20);


// This is the end...
// My only friend,
// The end!!
?>