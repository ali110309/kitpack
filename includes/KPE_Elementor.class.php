<?php
/**
 *
 * add farsi font to elementor editor
 *
 */
$options = get_option( 'kpe' );
if ($options['elementor-farsi-font']):
	add_action( 'elementor/editor/before_enqueue_scripts', function () {
		wp_enqueue_style( 'kpe-elementor', plugins_url( 'assets/css/kpe_editor-elementor.css', __FILE__ ) );
	} );
	add_action( 'elementor/preview/enqueue_styles', function () {
		wp_enqueue_style( 'kpe-elementor-preview', plugins_url( 'assets/css/kpe_preview-elementor.css', __FILE__ ) );
	} );
endif;
require_once(KPE_PATH.'includes/lib/elementor-translate.php');