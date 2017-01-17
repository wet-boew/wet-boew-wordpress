<!--
<nav role="navigation" id="wb-sec" typeof="SiteNavigationElement" class="col-md-3 col-md-pull-9 visible-md visible-lg">
<h2><?php _e("Secondary menu"); ?></h2>

        <section>
            <ul class="list-group menu list-unstyled">
            
            <?php   /* Widgetized sidebar, if you have the plugin installed. */ 
            if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left_column') ) { ?>
                <li><?php _e("\"Widgetized sidebar\" not supported"); ?></li>
            </ul>
        <?php /* If it's homepage */ if ( is_home() || is_page() ) { ?>
            <h3><?php _e("Meta"); ?></h3>
            <ul class="list-group menu list-unstyled">
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <li><a href="http://wordpress.org/" title="<?php _e("Is proudly propulsed by Wordpress"); ?>">WordPress</a></li>
                <?php wp_meta(); ?>
            </ul>

            <h3><?php _e("Links"); ?></h3>
            <ul>
                <?php wp_list_bookmarks(array( 'title_before' => '<h4>', 'title_after' => '</h4>' ) ); ?>
            </ul>               
            <?php } ?>	
        <?php } else { ?>
        </ul>
        <?php } ?>
        </section>
</nav>
-->