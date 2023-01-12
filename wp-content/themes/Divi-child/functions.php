<?php

/**
 * Custom Functions file for current theme.
 *
 */

// IMPORT PARENT STYLE
function child_theme_enqueue_styles()
{
    $parent_style = 'divi-style'; // This is 'divi-style' for the Divi theme.
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');

/*
*Load custom Blog Module 
*/

function divi_custom_blog_module()
{
    get_template_part('/includes/Blog');
    $dcfm = new custom_ET_Builder_Module_Blog();
    remove_shortcode('et_pb_blog');
    add_shortcode('et_pb_blog', array($dcfm, '_shortcode_callback'));
}
add_action('et_builder_ready', 'divi_custom_blog_module');

function divi_custom_blog_class($classlist)
{
    // Blog Module 'classname' overwrite. 
    $classlist['et_pb_blog'] = array('classname' => 'custom_ET_Builder_Module_Blog',);
    return $classlist;
}

add_filter('et_module_classes', 'divi_custom_blog_class');

require get_template_directory() . '-child/inc/init.php';

register_activation_hook(__FILE__, 'divi_rewrite_flush');
add_action('after_switch_theme', 'divi_rewrite_flush');
function divi_rewrite_flush()
{
    divi_products_cpt();
    divi_services_cpt();
    divi_articles_cpt();

    flush_rewrite_rules();
}

function delete_post_type()
{
    unregister_post_type('project');
}
add_action('init', 'delete_post_type', 100);
