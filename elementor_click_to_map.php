<?php
/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Michael Gangolf
 * @copyright         2022 Michael Gangolf
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Elementor - Click to map
 * Plugin URI:        https://github.com/m1ga/elementor_click_to_map
 * Description:       Elementor control that opens Google Map iframe after clicking accept.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Michael Gangolf
 * Author URI:        https://www.migaweb.de/
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://github.com/m1ga/elementor_click_to_map
 */

add_action('wp_enqueue_scripts', 'enqueue_click_to_map_scripts');

function enqueue_click_to_map_scripts()
{
    wp_register_style('click_to_map_styles', plugins_url('styles/main.css', __FILE__));
    wp_enqueue_style('click_to_map_styles');
    wp_register_script('click_to_map_script', plugins_url('scripts/main.js', __FILE__), '', '', true);
    wp_enqueue_script('click_to_map_script');
}

use Elementor\Plugin;

add_action('init', static function () {
    if (! did_action('elementor/loaded')) {
        return false;
    }
    require_once(__DIR__ . '/widget/click_to_map.php');
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_Widget_Click_To_Map());
});
