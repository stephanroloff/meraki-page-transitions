<?php
/**
 * Plugin Name:       Page Transitions Plugin
 * Description:       Simple Page Transitions.
 * Requires at least: 5.8
 * Requires PHP:      8.0
 * Version:           0.1.0
 * Author:            Stephan R
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       meraki
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

define('MY_PLUGIN_URL',plugin_dir_url(__FILE__));
define('MY_PLUGIN_PATH',plugin_dir_path(__FILE__));

require_once(__DIR__ . '/lib/EnqueueScripts.php');  
require_once(__DIR__ . '/lib/AcfJsonSupport.php');  
require_once(__DIR__ . '/lib/AddOptionsPage.php');  
require_once(__DIR__ . '/lib/InitialStyles.php');  
require_once(__DIR__ . '/lib/EditorSelectBodyColor.php');  
require_once(__DIR__ . '/lib/SendDataBackendToFrontend.php');  
require_once(__DIR__ . '/lib/slugColorRelationship.php');  




