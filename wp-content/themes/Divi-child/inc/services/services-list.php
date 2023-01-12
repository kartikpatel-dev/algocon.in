<?php
if (!function_exists('services_list_callback')) {
    add_shortcode('services_list', 'services_list_callback');

    function services_list_callback()
    {
        ob_start();

        $args = array(
            'post_type' => 'services',
            'posts_per_page' => -1,
        );

        $the_services = new WP_Query($args);
?>
        <div class="services_page services_list">
            <?php
            if ($the_services->have_posts()) {

                while ($the_services->have_posts()) : $the_services->the_post();

                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                    <div class="service_item">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <div class="service_item_img">
                                <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <div class="service_item_content">
                                <h3 class="service_item_title"><?php the_title(); ?></h3>
                                <div class="service_item_desc">
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
