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

use WP_Block_Pattern_Categories_Registry;

/**
 * Init Class
 *
 * @package accountra
 */
class Block_Patterns {

	/**
	 * Instance variable
	 *
	 * @var $instance
	 */
	private static $instance;

	/**
	 * Class instance.
	 *
	 * @return BlockPatterns
	 */
	public static function instance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->register_block_patterns();
		$this->register_synced_patterns();
	}

	/**
	 * Register Block Patterns
	 */
	private function register_block_patterns() {
		$block_pattern_categories = array(
			'accountra-core' => array( 'label' => esc_html__( 'Accountra Core Patterns', 'accountra' ) ),
		);

		if ( defined( 'GUTENVERSE' ) ) {
			$block_pattern_categories['accountra-gutenverse'] = array( 'label' => esc_html__( 'Accountra Gutenverse Patterns', 'accountra' ) );
			$block_pattern_categories['accountra-pro'] = array( 'label' => esc_html__( 'Accountra Gutenverse PRO Patterns', 'accountra' ) );
		}

		$block_pattern_categories = apply_filters( 'accountra_block_pattern_categories', $block_pattern_categories );

		foreach ( $block_pattern_categories as $name => $properties ) {
			if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
				register_block_pattern_category( $name, $properties );
			}
		}

		$block_patterns = array(
			'accountra-core-footer',
			'accountra-core-header',
			'accountra-core-404',
			'accountra-core-archive-hero-title',
			'accountra-core-index-hero-title',
			'accountra-core-page-title',
			'accountra-core-search-hero-title',
			'accountra-core-single-post-title',
			'accountra-core-home-hero',
			'accountra-core-home-about',
			'accountra-core-funfact-home',
			'accountra-core-home-service',
			'accountra-core-home-background-cases-studies',
			'accountra-core-home-cases-studies',
			'accountra-core-home-clients-feedback',
			'accountra-core-home-cta',
		);

		if ( defined( 'GUTENVERSE' ) ) {
			$block_patterns[] = 'accountra-gutenverse-footer';
			$block_patterns[] = 'accountra-gutenverse-header';
			$block_patterns[] = 'accountra-gutenverse-404-hero';
			$block_patterns[] = 'accountra-gutenverse-archive-title';
			$block_patterns[] = 'accountra-gutenverse-archive-posts';
			$block_patterns[] = 'accountra-gutenverse-index-title';
			$block_patterns[] = 'accountra-gutenverse-index-posts';
			$block_patterns[] = 'accountra-gutenverse-page-title';
			$block_patterns[] = 'accountra-gutenverse-page-posts';
			$block_patterns[] = 'accountra-gutenverse-search-title';
			$block_patterns[] = 'accountra-gutenverse-search-search';
			$block_patterns[] = 'accountra-gutenverse-search-posts';
			$block_patterns[] = 'accountra-gutenverse-single-post-title';
			$block_patterns[] = 'accountra-gutenverse-home-hero';
			$block_patterns[] = 'accountra-gutenverse-about-about';
			$block_patterns[] = 'accountra-gutenverse-home-fun-fact';
			$block_patterns[] = 'accountra-gutenverse-service';
			$block_patterns[] = 'accountra-gutenverse-home-case-studies';
			$block_patterns[] = 'accountra-gutenverse-home-clients-feedback';
			$block_patterns[] = 'accountra-gutenverse-about-cta';
			$block_patterns[] = 'accountra-gutenverse-home-blog';
			
		}

		$block_patterns = apply_filters( 'accountra_block_patterns', $block_patterns );
		$pattern_list   = get_option( 'accountra_synced_pattern_imported', false );
		if ( ! $pattern_list ) {
			$pattern_list = array();
		}

		$active_slug = get_stylesheet();
		$inserted_content = get_option(
			"gutenverse_{$active_slug}_content_inserted",
			array(
				'pages'    => array(),
				'patterns' => array(),
				'menus'    => array(),
				'content_has_menus' => array(),
			)
		);

		if ( function_exists( 'register_block_pattern' ) ) {
			foreach ( $block_patterns as $block_pattern ) {
				$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );
				$pattern_data = require $pattern_file;

				if ( (bool) $pattern_data['is_sync'] ) {
					$post = get_page_by_path( $block_pattern . '-synced', OBJECT, 'wp_block' );
					$post_id = $post ? $post->ID : null;
					if ( empty( $post ) ) {
						/**Download Image */
						$content = wp_slash( $pattern_data['content'] );
						$image_importer_ver = $pattern_data['image_importer_ver'] ?? null;
						if ( isset( $pattern_data['images'] ) && ! empty( $pattern_data['images'] ) ) {
							$images = json_decode( $pattern_data['images'] );
							if ( ! $image_importer_ver ) {
								foreach ( $images as $key => $image ) {
									$url  = $image->image_url;
									$data = Helper::check_image_exist( $url );
									if ( ! $data ) {
										$data = Helper::handle_file( $url );
									}
									$content  = str_replace( $url, $data['url'], $content );
									$image_id = $image->image_id;
									if ( $image_id && 'null' !== $image_id ) {
										$content = str_replace( '"imageId\":' . $image_id, '"imageId\":' . $data['id'], $content );
									}
								}
							} else {
								foreach ( $images as $key => $image ) {
									$url     = $key;
									$pattern = $image->pattern;
									$data    = Helper::check_image_exist( $url );
									if ( ! $data ) {
										$data = Helper::handle_file( $url );
									}
									foreach ( $pattern as $p ) {
										$placeholder_arr        = explode( '|', trim( $p, '{}' ) );
										$placeholder_value_type = end( $placeholder_arr );
										switch ( $placeholder_value_type ) {
											case 'url':
												$placeholder_data_type = $placeholder_arr[1];
												if ( 'case2' === $placeholder_data_type ) {
													$placeholder_data_size = $placeholder_arr[3];
													$target                = wp_get_attachment_image_url( $data['id'], $placeholder_data_size );
												} else {
													$target = wp_get_attachment_url( $data['id'] );
												}
												break;
											case 'id':
											default:
												$target = $data['id'];
												break;
										}
										$content = str_replace( $p, $target, $content );
									}
								}
							}
						}
						$content = $this->decode_unicode_sequences($content);
						$post_id = wp_insert_post(
							array(
								'post_name'    => $block_pattern . '-synced',
								'post_title'   => $pattern_data['title'],
								'post_content' => $content,
								'post_status'  => 'publish',
								'post_author'  => 1,
								'post_type'    => 'wp_block',
							)
						);
						if ( isset( $pattern_data['placeholder'] ) ) {
							$inserted_content['patterns'][] = array(
								'id' => $post_id,
								'is_remapped' => false,
								'placeholder' => ! empty( $pattern_data['placeholder'] ) ? $pattern_data['placeholder'] : '',
							);
						}
						if ( ! is_wp_error( $post_id ) ) {
							$pattern_category = $pattern_data['categories'];
							foreach ( $pattern_category as $category ) {
								wp_set_object_terms( $post_id, $category, 'wp_pattern_category' );
							}
						}
						$pattern_data['content']  = '<!-- wp:block {"ref":' . $post_id . '} /-->';
						$pattern_data['inserter'] = false;
						$pattern_data['slug']     = $block_pattern;

						$pattern_list[] = $pattern_data;
						/**Check if content has menu */
						$normalized_content = wp_unslash( $content );
						preg_match_all(
							'/"menuId"\s*:\s*(?:"(\d+)"|(\d+))/',
							$normalized_content,
							$matches
						);

						if ( ! empty( array_filter( array_merge( $matches[1], $matches[2] ) ) ) ) {
							$inserted_content['content_has_menus'][] = $post_id;
						}
					}
					
				} else {
					register_block_pattern(
						'accountra/' . $block_pattern,
						require $pattern_file
					);
				}
			}
			
			update_option( 'accountra_synced_pattern_imported', $pattern_list );
			update_option(
				"gutenverse_{$active_slug}_content_inserted",
				$inserted_content
			);
		}
	}

	/**
	 * Decode unicode sequences
	 *
	 * @param string $content .
	 * @return string
	 */
	private function decode_unicode_sequences( $content ) {
		return preg_replace_callback(
			'/\\\\u([0-9a-fA-F]{4})/',
			function ( $matches ) {

				$hex = strtolower( $matches[1] );

				// Always keep quotes escaped.
				if ( '0022' === $hex ) {
					return '\"';
				}

				$codepoint = hexdec( $hex );

				return mb_convert_encoding(
					pack( 'n', $codepoint ),
					'UTF-8',
					'UTF-16BE'
				);
			},
			$content
		);
	}

	/**
	 * Register Synced Patterns
	 */
	 private function register_synced_patterns() {
		$patterns = get_option( 'accountra_synced_pattern_imported' );

		 foreach ( $patterns as $block_pattern ) {
			 register_block_pattern(
				'accountra/' . $block_pattern['slug'],
				$block_pattern
			);
		 }
	 }
}
