<?php

class SendDataBackendToFrontend {

    public function __construct() {
        // Enganchar la acción para cargar los scripts
        add_action('wp_enqueue_scripts', array($this, 'enqueueCustomScripts'));
    }

    public function enqueueCustomScripts() {
        // Obtener datos del grupo de campos 'all_background_colors'
        $all_background_colors = get_field('all_background_colors', 'option');

        // Pasar los datos a JavaScript usando wp_localize_script
        wp_localize_script('my-script', 'allBackgroundColors', $all_background_colors);
    }
    
}

// Instanciar la clase para enganchar las acciones
new SendDataBackendToFrontend();
