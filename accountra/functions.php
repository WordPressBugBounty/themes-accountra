<?php
/**
 * Theme Functions
 *
 * @author Jegstudio
 * @package accountra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

defined( 'ACCOUNTRA_VERSION' ) || define( 'ACCOUNTRA_VERSION', '1.1.0' );
defined( 'ACCOUNTRA_DIR' ) || define( 'ACCOUNTRA_DIR', trailingslashit( get_template_directory() ) );

defined( 'GUTENVERSE_COMPANION_REQUIRED_VERSION' ) || define( 'GUTENVERSE_COMPANION_REQUIRED_VERSION', '2.3.3' );
defined( 'GUTENVERSE_LIBRARY_SERVER' ) || define( 'GUTENVERSE_LIBRARY_SERVER', 'https://gutenverse.com' );

require get_parent_theme_file_path( 'inc/autoload.php' );

Accountra\Init::instance();
