<?php
/**
 * Plugin Name:	Plugin Name
 * Plugin URI:	plugin-uri
 * Description:	plugin-description
 * Version:		1.0.0
 * Author:		author-name
 * Author URI:	author-uri
 * Text Domain:	plugin-name
 * Domain Path:	/languages
 *
 * @package           PluginName
 */

namespace PluginName;

if ( !defined( 'WPINC' ) ) {
    die;
}

/**
 * Compose autoload file
 */
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

define('PLUGIN_NAME_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('PLUGIN_NAME_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('PLUGIN_NAME_PLUGIN_VERSION', '1.0.0');


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-shortener-activator.php
 */
function plugin_name_activate( $network_wide ) {
    utils\Activator::activate( $network_wide );
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-shortener-deactivator.php
 */
function plugin_name_deactivate() {
    utils\Deactivator::deactivate();
}

register_activation_hook( __FILE__, '\BsShortener\plugin_name_activate' );
register_deactivation_hook( __FILE__, '\BsShortener\plugin_name_deactivate' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function plugin_name_run() {
    $plugin = new Main();
    $plugin->run();
}
plugin_name_run();