<?php

/**
 * Register Custom 'Products' Post Type
 * Hooks into init.
 */

function divi_products_cpt()
{
    $themeName = 'Divi-Child';
    $pluralName = 'Products';
    $singularName = 'Product';
    $postSlug = 'products';

    $labels  = array(
        'name'                  => esc_html_x($pluralName, 'Post Type General Name', $themeName),
        'singular_name'         => esc_html_x($singularName, 'Post Type Singular Name', $themeName),
        'menu_name'             => esc_html__($pluralName, $themeName),
        'name_admin_bar'        => esc_html__($singularName, $themeName),
        'archives'              => esc_html__($singularName . ' Archives', $themeName),
        'attributes'            => esc_html__($singularName . ' Attributes', $themeName),
        'all_items'             => esc_html__('All ' . $pluralName, $themeName),
        'add_new_item'          => esc_html__('Add New ' . $singularName, $themeName),
        'add_new'               => esc_html__('Add New ' . $singularName, $themeName),
        'new_item'              => esc_html__('New ' . $singularName, $themeName),
        'edit_item'             => esc_html__('Edit ' . $singularName, $themeName),
        'update_item'           => esc_html__('Update ' . $singularName, $themeName),
        'view_item'             => esc_html__('View ' . $singularName, $themeName),
        'view_items'            => esc_html__('View ' . $singularName, $themeName),
        'search_items'          => esc_html__('Search ' . $singularName, $themeName),
        'not_found'             => esc_html__($singularName . ' not found', $themeName),
        'not_found_in_trash'    => esc_html__($singularName . ' not found in Trash', $themeName),
        'featured_image'        => esc_html__('Featured Image', $themeName),
        'set_featured_image'    => esc_html__('Set featured image', $themeName),
        'remove_featured_image' => esc_html__('Remove featured image', $themeName),
        'use_featured_image'    => esc_html__('Use as featured image', $themeName),
        'insert_into_item'      => esc_html__('Insert into ' . $singularName, $themeName),
        'uploaded_to_this_item' => esc_html__('Uploaded to this ' . $singularName, $themeName),
        'items_list'            => esc_html__($singularName . ' list', $themeName),
        'items_list_navigation' => esc_html__($singularName . ' list navigation', $themeName),
        'filter_items_list'     => esc_html__('Filter list', $themeName),
    );

    $rewrite = array(
        'slug'       => $postSlug,
        'with_front' => true,
        'pages'      => true,
        'feeds'      => false,
    );

    $args    = array(
        'label'               => esc_html__($pluralName, $themeName),
        'description'         => esc_html__($singularName . '.', $themeName),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'hierarchical'        => false,
        'public'              => true,
        'menu_icon'           => 'dashicons-products',
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => $postSlug.'-list',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type($postSlug, $args);
}
add_action('init', 'divi_products_cpt', 0);
