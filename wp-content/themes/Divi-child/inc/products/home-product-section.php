<?php
if (!function_exists('home_products_callback')) {
    add_shortcode('home_products', 'home_products_callback');

    function home_products_callback()
    {
        ob_start();

        $args = array(
            'post_type' => 'products',
            'posts_per_page' => 8,
        );

        $the_products = new WP_Query($args);
?>
        <div class="home_products_list">
            <?php
            if ($the_products->have_posts()) {

                while ($the_products->have_posts()) : $the_products->the_post();

                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                    <div class="hpl_item">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <div class="item_img">
                                <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <div class="item_content">
                                <h3 class="item_title"><?php the_title(); ?></h3>
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
