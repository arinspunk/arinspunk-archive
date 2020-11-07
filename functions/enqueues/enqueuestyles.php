<?php

/*
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
ENCOLAR HOJAS DE ESTILO (CSS)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/

function site_styles() {

  	/*
  	--------------------------------------------------------------------------------
	Registra y encola aquí tus ficheros CSS
	Comenta lo que no necesites, nuestro sitio será ligero como astronauta en órbita
	--------------------------------------------------------------------------------
	*/

	$generales 		= true;
	
	// Estilos generales
	if ( $generales ) :
	  	wp_register_style( 'app',  get_template_directory_uri() . '/css/app.css' );
		wp_enqueue_style( 'app' );
	endif;
	
}
add_action( 'wp_enqueue_scripts', 'site_styles' );

/*
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
ENCOLAR HOJA DE ESTILO (CSS) PARA LA PÁGINA DE ACCESO A WP (LOGIN)
- Con el if/endif hacemos que sólo se encole en la página de login
- is_login_page() es una función que creamos previamente en "functions/installation.php"
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/

function crepes_login_stylesheet() {

	if ( is_login_page() ) : // is_login_page no existe en el codex de WP, la generamos en /functions/installation.php
	    wp_register_style( 'custom-login',  get_template_directory_uri() . '/_/css/admin.css' );
		wp_enqueue_style( 'custom-login');
	endif;

}
add_action( 'login_enqueue_scripts', 'crepes_login_stylesheet' );

// This is the end...
// My only friend,
// The end!!
?>