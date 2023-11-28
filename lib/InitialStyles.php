<?php

/*
Para que la transicion sea posible debe tener desde el inicio, osea al momento de rendetrizarse la primera vez ya los colores de background definidos.
Si no esto no es asi cada vez que cambiemos de una pagina a otra se verá un destello blanco que arruina el efecto de transicion.
*/

class InitialStyles {

    private $plugin_path;

    public function __construct() {
        $this->plugin_path = MY_PLUGIN_URL;
        add_action('wp_enqueue_scripts', array($this, 'registrarEstilos'));
        add_action('wp_enqueue_scripts', array($this, 'agregarEstilosEnLinea'));
    }
    

    public function registrarEstilos() {
        // Cambia la ruta de la hoja de estilos según la ubicación real de tu archivo CSS
        wp_register_style('estilos-generales', $this->plugin_path . 'build/index.css', array(), '1.0', 'all');
        wp_enqueue_style('estilos-generales');
    }

    public function agregarEstilosEnLinea() {

        $styles='body.colorCurrentPage-to-colorPageWeAreGoingTo {
                    animation: colorCurrentPage_to_colorPageWeAreGoingTo 0.3s forwards;
                 } ';

        // Check if the repeater field 'all_background_colors' exists.
        if (have_rows('all_background_colors', 'option')) {
            // Loop through rows.
            while (have_rows('all_background_colors', 'option')) : the_row();
                // Load sub field value.
                $string_with_hashtag = get_sub_field('background_color');
                $string_without_hashtag = str_replace('#', '', $string_with_hashtag);
                // Check if the sub field value exists before doing something with it.
                if ($string_with_hashtag) {
                    // Output the sub field value.
                    $colorString = "body.body-bg-$string_without_hashtag {
                        background-color: $string_with_hashtag;
                    } ";
                    $styles = $styles . $colorString;
                }
            // End loop.
            endwhile;
        } else {
            // Output a message if the repeater field doesn't exist or has no rows.
            echo 'No rows found in the repeater field "all_background_colors".';
        }

        wp_add_inline_style('estilos-generales', $styles);
    }
}

// Instanciar la clase para inicializar las acciones
$InitialStyles = new InitialStyles();
