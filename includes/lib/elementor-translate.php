<?php
/**
 *
 * load persian translate for elementor-pro text-domain.
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$my_options = get_option('kpe');
if ($options['elementor-pro-translate-farsi']):
	if (get_locale() == 'fa_IR' ) {
		$text_domain = 'elementor-pro';
		$kpe_elementor_lang = KPE_PATH . "/languages/$text_domain/$text_domain-fa_IR.mo";
		$wordpress_lang = "wp-content/languages/plugins/$text_domain-fa_IR.mo";
		unload_textdomain($text_domain);
		load_textdomain($text_domain, $kpe_elementor_lang );
	}
endif;
if ($options['elementor-translate-farsi']):
	if (get_locale() == 'fa_IR' ) {
		$text_domain = 'elementor';
		$kpe_elementor_lang = KPE_PATH . "/languages/$text_domain/$text_domain-fa_IR.mo";
		$wordpress_lang = "wp-content/languages/plugins/$text_domain-fa_IR.mo";
		unload_textdomain($text_domain);
		load_textdomain($text_domain, $kpe_elementor_lang );
	}
endif;
if ($options['elementskit-lite-translate-farsi']):
	if (get_locale() == 'fa_IR' ) {
		$text_domain = 'elementskit-lite';
		$kpe_elementor_lang = KPE_PATH . "/languages/$text_domain/$text_domain-fa_IR.mo";
		$wordpress_lang = "wp-content/languages/plugins/$text_domain-fa_IR.mo";
		unload_textdomain($text_domain);
		load_textdomain($text_domain, $kpe_elementor_lang );
	}
endif;