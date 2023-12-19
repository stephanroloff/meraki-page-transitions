<?php 

class MenuClassOnSave {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'generateRelationshipArray'));
    }

    public function generateRelationshipArray() {

        $slugColorRelationship = [];
        
        $pages = get_pages();
        
        foreach ($pages as $page) {
            // Obtener la parte de la cadena después del prefijo
            
            $bg_class = get_post_meta($page->ID, 'bg_class_meta_key', true);
            $prefix = "body-bg-";
            $result = substr($bg_class, strlen($prefix));

            if(!$result){
                continue;
            }
            $homepage_url = get_permalink($page->ID);
            
            array_push($slugColorRelationship, [$homepage_url, $result]);
        }
        
        wp_localize_script('my-script', 'slugColorRelationship', $slugColorRelationship);
    }
    
}

// Instanciar la clase para enganchar el gancho
$menuClassOnSave = new MenuClassOnSave();
