<?php
/**
 * Displays the featured image for CADUS Theme
 *
 * @author Carlos Cruz
 * @since CADUS 1.0
 */

if ( has_post_thumbnail() && ! post_password_required() ) {

    $featured_media_inner_classes = '';

    // Make the featured media thinner on archive pages.
    if ( ! is_singular() ) {
        $featured_media_inner_classes .= ' medium';
    }
    ?>

    <figure class="featured-media">

        <div class="featured-media-inner section-inner<?php echo $featured_media_inner_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">

            <?php
            the_post_thumbnail(array(960, 540));

            $caption = get_the_post_thumbnail_caption();

            if ( $caption ) {
                ?>

                <figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>

                <?php
            }
            ?>

        </div><!-- .featured-media-inner -->

    </figure><!-- .featured-media -->

    <?php
}
