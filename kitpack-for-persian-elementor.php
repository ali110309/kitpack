<?php
/**
 * Plugin Name:  kitpack for persian elementor
 * Description:  دسترسی به تمپلیت های آماده، تغییر فونت ظاهر المنتور، اضافه شدن فونت های فارسی به المنتور
 * Plugin URI:   https://kitpack.ir
 * Author:       کیت پک
 * Author URI:
 * Version:1.9.2
 * Text Domain:  KPE
 * Domain Path:  /languages
 * Tested up to: 5.7
 * Elementor tested up to: 3.1.4
 * Elementor Pro tested up to: 3.2.1
 * Tags:         فونت فارسی, فونت المنتور, افزودنی المنتور, صفحه ساز, ایران, rtl, farsi, parsian, iran, fa_IR
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.
add_action( 'plugins_loaded', 'kpe_init' );
/**
 *
 * Init function for kpe
 *
 */
function kpe_init() {
	define( 'KPE_VERSION', '1.9.2' );
	define( 'KPE_URL', plugins_url( '/', __FILE__ ) );
	define( 'KPE_PATH', plugin_dir_path( __FILE__ ) );


	if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
		add_action( 'admin_notices', 'kpe_dependency' );

		return;
	}

	if ( ! version_compare( PHP_VERSION, '7.2', '>=' ) ) {
		add_action( 'admin_notices', 'kpe_fail_php_version' );

		return;
	}
	if (is_admin())
	{
		require_once plugin_dir_path(__FILE__) . '/includes/lib/codestar-framework/codestar-framework.php' ;
		require_once plugin_dir_path(__FILE__) . '/includes/KPE_Options.class.php';
	}
		require_once plugin_dir_path(__FILE__) . '/includes/KPE_Elementor.class.php';
		require_once plugin_dir_path(__FILE__) . '/includes/lib/elementor-fonts.php';
		require_once plugin_dir_path(__FILE__) . '/includes/lib/elementor-icons.php';
}

class KPE_Core
{
	/**
	 * Construction
	 *
	 * Construct KPE_Core class runs required hooks.
	 *
	 * @since 1.0.0
	 *
	 */
	function __construct()
	{
		register_activation_hook(__FILE__, array(
			$this,
			'init'
		));

		add_action('admin_enqueue_scripts', array(
			$this,
			'admin_script'
		) , 1);
		add_action('elementor/frontend/before_enqueue_styles', array(
			$this,
			'kpe_font'
		) , 2);
		add_action('elementor/editor/before_enqueue_scripts', array(
			$this,
			'kpe_script_icons'
		) , 3);
		add_action('elementor/frontend/before_enqueue_styles', array(
			$this,
			'kpe_style_icons'
		) , 4);
		add_filter('plugin_action_links_' . plugin_basename(__FILE__) , array(
			$this,
			'add_settings_link'
		));
	}

	/**
	 * Activation Hook function
	 *
	 * Runs when plugin is activated.
	 *
	 * @since 1.0.0
	 *
	 */
	public function init()
	{
		load_plugin_textdomain('kpe');
	}
	/**
	 * Settings shortcut
	 *
	 * Adds settings page shortcit link to plugins page.
	 *
	 * @since 1.2.0
	 *
	 * @param array $links array of existing links.
	 * @return array Link to settings page.
	 */
	public function add_settings_link($links)
	{

		$settings_link = '<a href="' . get_admin_url() . 'admin.php?page=KPE">' . __('تنظیمات', 'kpe') . '</a> | <a href=" https://kitpack.ir" target="_blank">' . __('کیت پک', 'kpe-site') . '</a>';
		array_push($links, $settings_link);
		return $links;
	}
	/**
	 * Load  CSS
	 *
	 * Loads CSS in admin interface.
	 *
	 * @since 1.0.0
	 *
	 */
	public function admin_script()
	{
		$options = get_option( 'kpe' );
		if ($options['admin-farsi-font']):
			wp_enqueue_style('kpe-admin-css', plugin_dir_url(__FILE__) . 'includes/assets/css/kpe_dashboard_admin.css');
		endif;
	}
	public function kpe_font() {
		$options = get_option( 'kpe' );
		if ($options['anjoman-font']):
				wp_enqueue_style( 'anjoman-font-elementor', 'https://rawcdn.githack.com/ali110309/cdn-font/363ebcf6763fd4d51efe2db7c21d27608922f9c3/anjoman-font.css' );
		endif;
		if ($options['vazir-font']):
				wp_enqueue_style( 'vazir-font-elementor', 'https://rawcdn.githack.com/ali110309/cdn-font/ceefd5719b7b5fd806394dec88dd14c2a8fa703b/vazir-font.css' );
		endif;
		if ($options['samim-font']):
				wp_enqueue_style( 'samim-font-elementor', 'https://rawcdn.githack.com/ali110309/cdn-font/56509564a5270b67a6068435a4e8fe14bfcffca5/samim-font.css' );
		endif;
		if ($options['shabnam-font']):
				wp_enqueue_style( 'shabnam-font-elementor', 'https://rawcdn.githack.com/ali110309/cdn-font/d6cf88a1a77604a7cf7fe1b1243e5c9bb74d9db9/shabnam.css' );
		endif;
		if ($options['mikhak-font']):
				wp_enqueue_style( 'mikhak-font-elementor', 'https://rawcdn.githack.com/ali110309/cdn-font/ee1dfa745e99a3c1cb36b9ed73b52da28866e07c/mikhak.css' );
		endif;
		if ($options['kara-font']):
				wp_enqueue_style( 'kara-font-elementor', 'https://rawcdn.githack.com/ali110309/cdn-font/94ed218555a4d89967fba0c6cda2243d248b43be/kara-font.css' );
		endif;
	}
	public function kpe_script_icons()
	{
		$options = get_option( 'kpe' );
		if ($options['elementor-icon-iran']):
		wp_enqueue_style( 'ikpe-elementor-icon',plugins_url( 'includes/lib/icons/irani-icons/ikpe-font.css',  __FILE__ ) );
		endif;
	}
	public function kpe_style_icons()
	{
		$options = get_option( 'kpe' );
		if ($options['elementor-icon-iran']):
		wp_enqueue_style( 'ikpe-elementor-icon',plugins_url( 'includes/lib/icons/irani-icons/ikpe-font.css',  __FILE__ ) );
		endif;
	}
	
}

new KPE_Core;