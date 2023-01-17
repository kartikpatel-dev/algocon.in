<?php
if (!function_exists('divi_related_products_callback')) {
    add_shortcode('related_products', 'divi_related_products_callback');

    function divi_related_products_callback()
    {
        ob_start();

        global $post;

        $args = array(
            'post_type' => 'products',
            'post__not_in' => array($post->ID),
            'posts_per_page' => 4,
        );

        $the_query = new wp_query($args);

        if ($the_query->have_posts()) {
?>
            <div class="et_pb_ajax_pagination_container">
                <?php
                while ($the_query->have_posts()) : $the_query->the_post();

                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                    <article class="et_pb_post clearfix products type-products">
                        <a href="<?php echo get_the_permalink(); ?>" class="entry-featured-image-url">
                            <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>">
                        </a>
                        <div class="custom_content_wrapper">
                            <h2 class="entry-title">
                                <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </div>
                    </article>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
<?php
        }
        wp_reset_query();

        return ob_get_clean();
    }
}
