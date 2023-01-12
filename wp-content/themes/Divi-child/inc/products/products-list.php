<?php
if (!function_exists('products_list_callback')) {
    add_shortcode('products_list', 'products_list_callback');

    function products_list_callback()
    {
        ob_start();

        $args = array(
            'post_type' => 'products',
            'posts_per_page' => -1,
        );

        $the_products = new WP_Query($args);
?>
        <div class="products_page products_list">
            <?php
            if ($the_products->have_posts()) {

                while ($the_products->have_posts()) : $the_products->the_post();

                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                    <div class="product_item">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <div class="product_item_img">
                                <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <div class="product_item_content">
                                <h3 class="product_item_title"><?php the_title(); ?></h3>
                            </div>
                        </a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            }

            wp_reset_query();
            ?>
        </div>
<?php
        return ob_get_clean();
    }
}
