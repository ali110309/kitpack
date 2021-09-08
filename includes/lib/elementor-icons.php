<?php
$options = get_option('kpe');
if ($options['elementor-icon-iran']):
	add_filter( 'elementor/icons_manager/native', 'add_ikpeicons_to_icon_manager' );

	function add_ikpeicons_to_icon_manager( $settings ) {
		$json_url = plugin_dir_url( __FILE__ ) . '/icons/irani-icons/config.json';

		$settings['ikpeicons'] = [
			'name'          => 'آیکون پک ایرانی',
			'label'         => esc_html__( 'آیکون پک ایرانی', 'text-domain' ),
			'url'           => false,
			'enqueue'       => false,
			'prefix'        => 'ikpe-',
			'displayPrefix' => '',
			'labelIcon'     => 'ikpe-kp',
			'ver'           => '5.3.0',
			'fetchJson'     => $json_url,
			'native'        => true,
		];

		return $settings;
	}
endif;