<?php
/**
 * 404 file for CADUS Theme
 *
 * @author Carlos Cruz
 * @since CADUS 1.0
 */

get_header();
?>

    <main id="site-content" role="main">

        <div class="section-inner thin error404-content">

            <h1 class="entry-title"><?php _e( 'Page Not Found', 'cadus' ); ?></h1>

            <div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'cadus' ); ?></p></div>

            <?php
            get_search_form(
                array(
                    'aria_label' => __( '404 not found', 'cadus' ),
                )
            );
            ?>

        </div><!-- .section-inner -->

    </main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();