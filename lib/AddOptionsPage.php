<?php

class AddOptionsPage {

public function __construct() {
    // Verifica si la función acf_add_options_page existe antes de usarla
    if( function_exists('acf_add_options_page') ) {
        // Agrega la página de opciones del tema
        acf_add_options_page(array(
            'page_title' => 'Page Transitions',
            'menu_title' => 'Page Transitions',
            'menu_slug'  => 'page-transitions',
            'capability' => 'edit_posts',
            'redirect'   => false
        ));
    }
}
}

// Instancia de la clase para activar la funcionalidad
$AddOptionsPage = new AddOptionsPage();
