<?php

class EditorSelectBodyColor {
    
    public function __construct() {
        add_action('add_meta_boxes', array($this, 'addBackgroundClassMetaBox'));
        add_action('save_post', array($this, 'saveBackgroundClass'));
        add_filter('body_class', array($this, 'addCustomBodyClass'));
    }

    public function addBackgroundClassMetaBox() {
        add_meta_box(
            'bg_class_metabox',                              // Argumento 1: ID del Metabox
            'Page Background Color',                         // Argumento 2: Título del Metabox
            array($this, 'displayBackgroundClassMetaBox'),   // Argumento 3: Callback para mostrar el contenido del Metabox
            'page',                                          // Argumento 4: Tipo de contenido al que se aplica el Metabox (en este caso, 'page')
            'side',                                          // Argumento 5: Contexto del Metabox (donde se mostrará, en este caso, en el lateral)
            'default'                                        // Argumento 6: Prioridad del Metabox en relación con otros Metabox en el mismo contexto
        );   
    }

    public function displayBackgroundClassMetaBox($post) {
        $bg_class = get_post_meta($post->ID, 'bg_class_meta_key', true);

        ?>
        <label for="bg-class-select">Select Background Color:</label>
        <br><br>
        <select name="bg_class_select" id="bg-class-select">
        <option value="">Select</option>
        <?php

        // Check if the repeater field 'all_background_colors' exists.
        if (have_rows('all_background_colors', 'option')) {
            // Loop through rows.
            while (have_rows('all_background_colors', 'option')) : the_row();
                // Load sub field value.
                $string_with_hashtag = get_sub_field('background_color');
                $string_without_hashtag = str_replace('#', '', $string_with_hashtag);
                $color_name = get_sub_field('color_name');

                if(!$color_name){
                    $color_name = $background_color;
                }
                // Check if the sub field value exists before doing something with it.
                if ($string_with_hashtag) {
                    // Output the sub field value.
                    ?>
                        <option value="body-bg-<?php echo $string_without_hashtag;?>" <?php selected($bg_class, "body-bg-$string_without_hashtag"); ?>><?php echo $color_name;?></option>
                    <?php
                }
            // End loop.
            endwhile;
        } else {
            // Output a message if the repeater field doesn't exist or has no rows.
            echo 'No rows found in the repeater field "all_background_colors".';
        }
        ?>
         </select>
         <?php

    }

    public function saveBackgroundClass($post_id) {
        if (isset($_POST['bg_class_select'])) {
            update_post_meta($post_id, 'bg_class_meta_key', $_POST['bg_class_select']);
        }
    }

    public function addCustomBodyClass($classes) {
        if (is_page()) {
            $bg_class = get_post_meta(get_the_ID(), 'bg_class_meta_key', true);
            if (!empty($bg_class)) {
                $classes[] = $bg_class;
            }
        }
        return $classes;
    }

}

// Instantiate the class to initialize actions and filters
$EditorSelectBodyColor = new EditorSelectBodyColor();
