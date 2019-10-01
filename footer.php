
<footer>
        <div class="container">
            <div class="row">

            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_col_1') ) : endif; ?>

            <!-- <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_col_2') ) : endif; ?> -->


            <div class="col-lg-5 col-md-12 col-sm-12"">
                <?php
                $footer_menu_defaults = array(
                    'theme_location'  => '',
                    'menu'            => 'footer',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'social',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'         => ''
                );
                wp_nav_menu( $footer_menu_defaults );
            ?>
            </div>

            </div>
        </div>
    </footer>

<?php wp_footer(); ?>
</body>
</html>