<?php
/**
 * Custom Functions file for current theme.
 *
 */

// IMPORT PARENT STYLE
function child_theme_enqueue_styles() {
    $parent_style = 'divi-style'; // This is 'divi-style' for the Divi theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

require get_template_directory() . '-child/inc/init.php';

register_activation_hook(__FILE__, 'divi_rewrite_flush');
add_action('after_switch_theme', 'divi_rewrite_flush');
function divi_rewrite_flush()
{
    divi_products_cpt();
    divi_services_cpt();
    
    flush_rewrite_rules();
}

function delete_post_type()
{
    unregister_post_type('project');
}
add_action('init', 'delete_post_type', 100);
?>
