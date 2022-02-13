<?php
/**
 * Header file for CADUS Theme
 * 
 * @author Carlos Cruz
 */
?>

<!DOCTYPE html>
<html lang="es">
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@twitCADUS" />
		<meta name="twitter:creator" content="@twitCADUS" />
		<meta property="og:url" content="<?php the_permalink() ?>" />
		<meta property="og:title" content="Consejo de Alumnos de la Universidad de Sevilla" />
		<meta property="og:description" content="<?php the_title() ?>" />
		<meta property="og:image" content="<?php (get_the_post_thumbnail_url() == false) ? "http://www.cadus.us.es/Photos/Web/Card-Twitter.png" : get_the_post_thumbnail_url() ?>" />
		<meta name="twitter:image:src" content="<?php (get_the_post_thumbnail_url() == false) ? "http://www.cadus.us.es/Photos/Web/Card-Twitter.png" : get_the_post_thumbnail_url() ?>">
		<meta name="twitter:widgets:new-embed-design" content="on">
		<meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
			
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

    </head>
<body <?php body_class(); ?>>

<?php
wp_body_open();
?>

    <header id="site-header" class="header-footer-group" role="banner">

        <div class="header-inner section-inner">

            <div class="header-titles-wrapper">

                <?php

                // Check whether the header search is activated in the customizer.
                $enable_header_search = get_theme_mod( 'enable_header_search', true );

                if ( true === $enable_header_search ) {

                    ?>

                    <button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<?php cadus_the_theme_svg( 'search' ); ?>
								</span>
								<span class="toggle-text"><?php _ex( 'Search', 'toggle text', 'cadus' ); ?></span>
							</span>
                    </button><!-- .search-toggle -->

                <?php } ?>

                <div class="header-titles">

                    <?php
                    // Site title or logo.
                    cadus_site_logo();

                    // Site description.
                    cadus_site_description();
                    ?>

                </div><!-- .header-titles -->

                <button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php cadus_the_theme_svg( 'ellipsis' ); ?>
							</span>
							<span class="toggle-text"><?php _e( 'Menu', 'cadus' ); ?></span>
						</span>
                </button><!-- .nav-toggle -->

            </div><!-- .header-titles-wrapper -->

            <div class="header-navigation-wrapper">

                <?php
                if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
                    ?>

                    <nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu', 'twentytwenty' ); ?>" role="navigation">

                        <ul class="primary-menu reset-list-style">

                            <?php
                            if ( has_nav_menu( 'primary' ) ) {

                                wp_nav_menu(
                                    array(
                                        'container'  => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary',
                                    )
                                );

                            } elseif ( ! has_nav_menu( 'expanded' ) ) {

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'walker'   => new TwentyTwenty_Walker_Page(),
                                    )
                                );

                            }
                            ?>

                        </ul>

                    </nav><!-- .primary-menu-wrapper -->

                    <?php
                }

                if ( true === $enable_header_search || has_nav_menu( 'expanded' ) ) {
                    ?>

                    <div class="header-toggles hide-no-js">

                        <?php
                        if ( has_nav_menu( 'expanded' ) ) {
                            ?>

                            <div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

                                <button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<span class="toggle-text"><?php _e( 'Menu', 'cadus' ); ?></span>
										<span class="toggle-icon">
											<?php cadus_the_theme_svg( 'ellipsis' ); ?>
										</span>
									</span>
                                </button><!-- .nav-toggle -->

                            </div><!-- .nav-toggle-wrapper -->

                            <?php
                        }

                        if ( true === $enable_header_search ) {
                            ?>

                            <div class="toggle-wrapper search-toggle-wrapper">

                                <button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner">
										<?php cadus_the_theme_svg( 'search' ); ?>
										<span class="toggle-text"><?php _ex( 'Search', 'toggle text', 'cadus' ); ?></span>
									</span>
                                </button><!-- .search-toggle -->

                            </div>

                            <?php
                        }
                        ?>

                    </div><!-- .header-toggles -->
                    <?php
                }
                ?>

            </div><!-- .header-navigation-wrapper -->

        </div><!-- .header-inner -->

        <?php
        // Output the search modal (if it is activated in the customizer).
        if ( true === $enable_header_search ) {
            get_template_part( 'template-parts/modal-search' );
        }
        ?>

    </header><!-- #site-header -->

<?php
// Output the menu modal.
get_template_part( 'template-parts/modal-menu' );