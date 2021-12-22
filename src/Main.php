<?php
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 *
 * @package    PluginName
 *
 */

namespace PluginName;

class Main {
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     *
     * @var PluginName\utils\Loader maintains and registers all hooks for the plugin
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     *
     * @var string the string used to uniquely identify this plugin
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     *
     * @var string the current version of the plugin
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        $this->plugin_name = 'plugin-name';
        $this->version = '1.0.0';
        $this->loader = new utils\Loader();
        $this->setLocale();
        $this->defineAdminHooks();
        $this->definePublicHooks();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the utils\Internationalization class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     */
    private function setLocale()
    {
        $plugin_i18n = new utils\Internationalization();

        $this->loader->addAction( 'plugins_loaded', $plugin_i18n, 'loadPluginTextdomain' );
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     */
    private function defineAdminHooks()
    {
        $plugin_admin = new admin\Controller( $this->getPluginName(), $this->getVersion() );

        $this->loader->addAction( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     */
    private function definePublicHooks()
    {
        $plugin_public = new front\Controller( $this->getPluginName(), $this->getVersion() );

        $this->loader->addAction( 'admin_enqueue_scripts', $plugin_public, 'enqueue_styles' );
    }
    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     *
     * @return string the name of the plugin
     */
    public function getPluginName()
    {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     *
     * @return PluginName\utils\Loader orchestrates the hooks of the plugin
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     *
     * @return string the version number of the plugin
     */
    public function getVersion()
    {
        return $this->version;
    }
}