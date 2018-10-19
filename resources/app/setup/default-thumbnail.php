<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

add_filter(
	'post_thumbnail_html',
	function( $html ) {
		if ( '' !== $html ) {
			return $html;
		}

		$default_thumbnail = get_theme_mod( 'default-thumbnail' );
		if ( ! $default_thumbnail ) {
			return $html;
		}

		return sprintf(
			'<img src="%1$s" alt="">',
			esc_url( $default_thumbnail )
		);
	}
);

/*
@todo ロゴとかにも反映されちゃうので、これはやめたほうが良い

add_filter(
	'wp_get_attachment_image_src',
	function( $image, $attachment_id, $size, $icon ) {
		if ( false !== $image ) {
			return $image;
		}

		if ( false !== $icon ) {
			return $image;
		}

		$default_thumbnail = get_theme_mod( 'default-thumbnail' );
		if ( ! $default_thumbnail ) {
			return $image;
		}

		return [
			$default_thumbnail,
			'',
			''
		];
	},
	10,
	4
);
*/
