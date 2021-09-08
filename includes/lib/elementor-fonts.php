<?php
/**
 * Add Font Group PARSI into editor
 */
add_filter( 'elementor/fonts/groups', function( $font_groups ) {
	$font_groups['PARSI'] = __( 'پک فونت های فارسی' );
	return $font_groups;
} );
/**
 * Add Group Fonts
 */
	add_filter( 'elementor/fonts/additional_fonts', function ( $additional_fonts ) {
		// Key/value
		//Font name/font group
		$options = get_option('kpe');
		if ($options['anjoman-font']):
			$additional_fonts['Anjoman'] = 'PARSI';
		endif;
		if ($options['vazir-font']):
			$additional_fonts['Vazir'] = 'PARSI';
			$additional_fonts['VazirFN'] = 'PARSI';
		endif;
		if ($options['samim-font']):
			$additional_fonts['Samim'] = 'PARSI';
		endif;
		if ($options['shabnam-font']):
			$additional_fonts['Shabnam'] = 'PARSI';
			$additional_fonts['ShabnamFN'] = 'PARSI';
		endif;
		if ($options['mikhak-font']):
			$additional_fonts['mikhak'] = 'PARSI';
		endif;
		if ($options['kara-font']):
			$additional_fonts['kara'] = 'PARSI';
		endif;
		return $additional_fonts;
	} );