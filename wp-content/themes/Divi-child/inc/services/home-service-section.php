<?php
if (!function_exists('home_services_callback')) {
    add_shortcode('home_services', 'home_services_callback');

    function home_services_callback()
    {
        ob_start();

        $args = array(
            'post_type' => 'services',
            'posts_per_page' => 6,
        );

        $the_services = new WP_Query($args);
?>
        <div class="home_services_list">
            <?php
            if ($the_services->have_posts()) {

                while ($the_services->have_posts()) : $the_services->the_post();

                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                    <div class="hsl_item">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <div class="item_img">
                                <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <div class="item_content">
                                <h3 class="item_title"><?php the_title(); ?></h3>
                                <div class="item_desc">
                                    <?php the_excerpt(); ?>
                                </div>
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
