<?php

/*
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
ENCOLAR SCRIPTS (JS)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/

function site_scripts() {

	/*
  	--------------------------------------------------------------------
	Registra y encola aquí tus ficheros JS
	Comenta lo que no necesites, nuestro sitio será ligero como un fotón 
	--------------------------------------------------------------------
	*/

	$generales 		= true;
	$slick 			= false; 
	
	//jQuery
	// wp_deregister_script( 'jquery' );
	// wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null );
	// wp_enqueue_script( 'jquery' );
	
	// Slick
	if ( $slick ) :
		wp_register_script( 'slick', get_template_directory_uri() . '/_/js/vendors/slick/slick.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'slick', $in_footer = true);
	endif;
	
	// Scripts generales
	if ( $generales ) :
		wp_register_script( 'app', get_template_directory_uri() . '/js/app.js', array('jquery'), '', true );
		wp_enqueue_script( 'app', $in_footer = true);
	endif;

}
add_action( 'wp_enqueue_scripts', 'site_scripts' );

// This is the end...
// My only friend,
// The end!!
?>