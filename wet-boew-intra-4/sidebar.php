<nav role="navigation" id="wb-sec" typeof="SiteNavigationElement" class="col-md-3 col-md-pull-9 visible-md visible-lg">
<h2><?php _e("<!--:en-->Secondary menu<!--:--><!--:fr-->Menu secondaire<!--:-->"); ?></h2>

        <section>
            <ul class="list-group menu list-unstyled">
            
            <?php   /* Widgetized sidebar, if you have the plugin installed. */ 
            if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Secondary Navigation') ) { ?>
                <li><?php _e("<!--:en-->\"Widgetized sidebar\" not supported<!--:--><!--:fr-->&laquo;&#160;<span lang=\"en\">Widgetized sidebar</span>&#160;&raquo; n'est pas soutenu<!--:-->"); ?></li>
            </ul>
        <?php /* If it's homepage */ if ( is_home() || is_page() ) { ?>
            <h3><?php _e("<!--:en-->Meta<!--:--><!--:fr-->Méta<!--:-->"); ?></h3>
            <ul class="list-group menu list-unstyled">
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <li><a href="http://wordpress.org/" title="<?php _e("<!--:en-->Is proudly propulsed by Wordpress<!--:--><!--:fr-->Est fièrement affiché par Wordpress<!--:-->"); ?>">WordPress</a></li>
                <?php wp_meta(); ?>
            </ul>

            <h3><?php _e("<!--:en-->Links<!--:--><!--:fr-->Liens<!--:-->"); ?></h3>
            <ul>
                <?php wp_list_bookmarks(array( 'title_before' => '<h4>', 'title_after' => '</h4>' ) ); ?>
            </ul>               
            <?php } ?>	
        <?php } else { ?>
        </ul>
        <?php } ?>
        </section>
</nav>