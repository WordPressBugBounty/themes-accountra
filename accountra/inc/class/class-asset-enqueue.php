<?php
/**
 * Block Pattern Class
 *
 * @author Jegstudio
 * @package accountra
 */
namespace Accountra;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Init Class
 *
 * @package accountra
 */
class Asset_Enqueue {
	/**
	 * Class constructor.
	 */
	public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 20 );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_scripts' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ), 20 );
	}

    /**
	 * Enqueue scripts and styles.
	 */
	public function enqueue_scripts() {
		wp_register_style(
			'accountra-style',
			get_stylesheet_uri(),
			array(),
			ACCOUNTRA_VERSION
		);

		wp_style_add_data( 'accountra-style', 'path', ACCOUNTRA_DIR );
		
		wp_enqueue_style( 'accountra-style' );

				wp_register_style( 'accountra-custom-styling', trailingslashit( get_template_directory_uri() ) . 'assets/css/accountra-custom-styling.css', array(), ACCOUNTRA_VERSION );
		if ( file_exists( trailingslashit( get_template_directory() ) . 'assets/css/accountra-custom-styling.css' ) && filesize( trailingslashit( get_template_directory() ) . 'assets/css/accountra-custom-styling.css' ) < 51200 ) {
			wp_style_add_data( 'accountra-custom-styling', 'path', trailingslashit( get_template_directory() ) . 'assets/css/accountra-custom-styling.css' );
		}
		wp_enqueue_style( 'accountra-custom-styling' );
		wp_register_script( 'accountra-animation-script', trailingslashit( get_template_directory_uri() ) . 'assets/js/accountra-animation-script.js', array(), ACCOUNTRA_VERSION, true );
		wp_enqueue_script( 'accountra-animation-script' );
		wp_register_style( 'accountra-presset', trailingslashit( get_template_directory_uri() ) . 'assets/css/accountra-presset.css', array(), ACCOUNTRA_VERSION );
		if ( file_exists( trailingslashit( get_template_directory() ) . 'assets/css/accountra-presset.css' ) && filesize( trailingslashit( get_template_directory() ) . 'assets/css/accountra-presset.css' ) < 51200 ) {
			wp_style_add_data( 'accountra-presset', 'path', trailingslashit( get_template_directory() ) . 'assets/css/accountra-presset.css' );
		}
		wp_enqueue_style( 'accountra-presset' );


        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
    }

	/**
	 * Enqueue admin scripts and styles.
	 */
	public function admin_scripts() {
		
    }
}
