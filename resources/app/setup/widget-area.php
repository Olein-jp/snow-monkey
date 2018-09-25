<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Add sidebar widget area
 *
 * @return void
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Sidebar', 'snow-monkey' ),
				'description'   => __( 'This widgets are displayed in the sidebar of posts and pages.', 'snow-monkey' ),
				'id'            => 'sidebar-widget-area',
				'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="c-widget__title">',
				'after_title'   => '</h2>',
			]
		);

		register_sidebar(
			[
				'name'          => __( 'Sticky sidebar', 'snow-monkey' ),
				'description'   => __( 'This widgets are displayed in the sidebar of posts and pages.', 'snow-monkey' ),
				'id'            => 'sidebar-sticky-widget-area',
				'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="c-widget__title">',
				'after_title'   => '</h2>',
			]
		);
	}
);

/**
* Add top of page title widget area
 *
 * @return void
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Top of the page title', 'snow-monkey' ),
				'description'   => __( 'This widgets are displayed on the title of the posts and pages.', 'snow-monkey' ),
				'id'            => 'title-top-widget-area',
				'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="c-widget__title">',
				'after_title'   => '</h2>',
			]
		);
	}
);

/**
* Add top of archive page widget area
 *
 * @return void
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Top of the archive page', 'snow-monkey' ),
				'description'   => __( 'This widgets are displayed top of the archive page.', 'snow-monkey' ),
				'id'            => 'archive-top-widget-area',
				'before_widget' => '<div class="l-archive-top-widget-area__item"><div id="%1$s" class="c-section %2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h2 class="c-section__title">',
				'after_title'   => '</h2>',
			]
		);
	}
);

/**
* Add bottom of contents widget area
*
* @return void
*/
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Bottom of contents', 'snow-monkey' ),
				'description'   => __( 'This widgets are displayed under the contents of posts and pages.', 'snow-monkey' ),
				'id'            => 'contents-bottom-widget-area',
				'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="c-widget__title">',
				'after_title'   => '</h2>',
			]
		);
	}
);

/**
* Add sidebar widget area
*
* @return void
*/
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Archive sidebar', 'snow-monkey' ),
				'id'            => 'archive-sidebar-widget-area',
				'description'   => __( 'This widgets are displayed in the sidebar of archive page .', 'snow-monkey' ),
				'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="c-widget__title">',
				'after_title'   => '</h2>',
			]
		);
	}
);

/**
 * Add front page widget area
 *
 * @return void
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Homepage (Top of page)', 'snow-monkey' ),
				'id'            => 'front-page-top-widget-area',
				'description'   => __( 'This widgets are displayed in the homepage.', 'snow-monkey' ),
				'before_widget' => '<div class="l-front-page-widget-area__item"><div id="%1$s" class="c-section %2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h2 class="c-section__title">',
				'after_title'   => '</h2>',
			]
		);

		add_filter(
			'dynamic_sidebar_params',
			function( $params ) {
				if ( 'front-page-top-widget-area' !== $params[0]['id'] ) {
					return $params;
				}

				$wp_page_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
				if ( ! $wp_page_template || 'default' === $wp_page_template || false !== strpos( $wp_page_template, 'one-column-full.php' ) || false !== strpos( $wp_page_template, 'one-column-fluid.php' ) ) {
					$params[0]['before_widget'] .= '<div class="c-container">';
					$params[0]['after_widget']  .= '</div">';
				}

				return $params;
			}
		);
	}
);

/**
 * Add front page widget area
 *
 * @return void
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Homepage (Bottom of page)', 'snow-monkey' ),
				'id'            => 'front-page-bottom-widget-area',
				'description'   => __( 'This widgets are displayed in the homepage.', 'snow-monkey' ),
				'before_widget' => '<div class="l-front-page-widget-area__item"><div id="%1$s" class="c-section %2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h2 class="c-section__title">',
				'after_title'   => '</h2>',
			]
		);

		add_filter(
			'dynamic_sidebar_params',
			function( $params ) {
			if ( 'front-page-bottom-widget-area' !== $params[0]['id'] ) {
				return $params;
			}

			$wp_page_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
			if ( ! $wp_page_template || 'default' === $wp_page_template || false !== strpos( $wp_page_template, 'one-column-full.php' ) || false !== strpos( $wp_page_template, 'one-column-fluid.php' ) ) {
				$params[0]['before_widget'] .= '<div class="c-container">';
				$params[0]['after_widget']  .= '</div">';
			}

			return $params;
			}
		);
	}
);

/**
 * Add home page widget area
 *
 * @return void
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Posts page (Top of page)', 'snow-monkey' ),
				'id'            => 'posts-page-top-widget-area',
				'description'   => __( 'This widgets are displayed in the posts page.', 'snow-monkey' ),
				'before_widget' => '<div class="l-posts-page-widget-area__item"><div id="%1$s" class="c-section %2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h2 class="c-section__title">',
				'after_title'   => '</h2>',
			]
		);

		add_filter(
			'dynamic_sidebar_params',
			function( $params ) {
			if ( 'posts-page-top-widget-area' !== $params[0]['id'] ) {
				return $params;
			}

			$wp_page_template = get_theme_mod( 'archive-page-layout' );
			if ( ! $wp_page_template || 'default' === $wp_page_template || false !== strpos( $wp_page_template, 'one-column-full.php' ) || false !== strpos( $wp_page_template, 'one-column-fluid.php' ) ) {
				$params[0]['before_widget'] .= '<div class="c-container">';
				$params[0]['after_widget']  .= '</div">';
			}

			return $params;
			}
		);
	}
);

/**
 * Add home page widget area
 *
 * @return void
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Posts page (Bottom of page)', 'snow-monkey' ),
				'id'            => 'posts-page-bottom-widget-area',
				'description'   => __( 'This widgets are displayed in the posts page.', 'snow-monkey' ),
				'before_widget' => '<div class="l-posts-page-widget-area__item"><div id="%1$s" class="c-section %2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h2 class="c-section__title">',
				'after_title'   => '</h2>',
			]
		);

		add_filter(
			'dynamic_sidebar_params',
			function( $params ) {
				if ( 'posts-page-bottom-widget-area' !== $params[0]['id'] ) {
					return $params;
				}

				$wp_page_template = get_theme_mod( 'archive-page-layout' );
				if ( ! $wp_page_template || 'default' === $wp_page_template || false !== strpos( $wp_page_template, 'one-column-full.php' ) || false !== strpos( $wp_page_template, 'one-column-fluid.php' ) ) {
					$params[0]['before_widget'] .= '<div class="c-container">';
					$params[0]['after_widget']  .= '</div">';
				}

				return $params;
			}
		);
	}
);

/**
 * Add footer widget area
 *
 * @return void
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			[
				'name'          => __( 'Footer', 'snow-monkey' ),
				'id'            => 'footer-widget-area',
				'description'   => __( 'This widgets are displayed in the footer.', 'snow-monkey' ),
				'before_widget' => '<div class="l-footer-widget-area__item c-row__col c-row__col--1-1 c-row__col--lg-1-1"><div id="%1$s" class="c-widget %2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h2 class="c-widget__title">',
				'after_title'   => '</h2>',
			]
		);
	}
);
