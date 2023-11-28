<?php

class EnqueueScripts {

    private $plugin_path;

    public function __construct() {
        $this->plugin_path = MY_PLUGIN_URL;
        add_action('wp_enqueue_scripts', array($this, 'addScripts'));
        add_action('wp_enqueue_scripts', array($this, 'addStyles'));
    }

    public function addScripts() {
        wp_register_script('my-script', $this->plugin_path . 'build/index.js', array('jquery'), '1.0', true);
        wp_enqueue_script('my-script');
    }

    public function addStyles() {
        wp_register_style('my-style', $this->plugin_path . 'build/index.css', array(), '1.0', 'all');
        wp_enqueue_style('my-style');
    }
}

// Instantiate the class to initialize actions and filters
$EnqueueScripts = new EnqueueScripts();
