<?php

class AcfJsonSupport {

    public function __construct() {
        // Enable automatic creation of ACF field JSON files
        // The key=group_6552430cadc85 parameter ensures that only the data related to the group with the key group_6552430cadc85 (Background Color) is stored locally.
        add_filter('acf/settings/save_json/key=group_6552430cadc85', array($this, 'saveJsonPath'));
        
        // Enable automatic loading of ACF field JSON files
        add_filter('acf/settings/load_json', array($this, 'loadJsonPath'));
    }

    public function saveJsonPath($path) {
        // Update the ACF JSON folder path
        $path = MY_PLUGIN_PATH . 'acf-json';
        
        // Create the ACF JSON folder if it doesn't exist
        if (!file_exists($path)) {
            mkdir($path);
        }
        // Return the new ACF JSON folder path
        return $path;
    }

    public function loadJsonPath($paths) {
        // Remove the default ACF JSON folder load path
        unset($paths[0]);
        // Add the new ACF JSON folder path
        $paths[] = MY_PLUGIN_PATH . 'acf-json';
        // Return the new ACF JSON folder paths
        return $paths;
    }
}

// Instanciar la clase
$AcfJsonSupport = new AcfJsonSupport();
