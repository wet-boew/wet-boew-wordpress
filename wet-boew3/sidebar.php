<?php
global $clf_col_num;
if ($clf_col_num=='1') {
 echo "</div>";
} elseif ($clf_col_num=='3') {
?>
		<div id="wb-sec"><div id="wb-sec-in"><nav role="navigation"><h2 id="wb-nav"><?php _e("<!--:en-->Secondary menu<!--:--><!--:fr-->Menu secondaire<!--:-->"); ?></h2>
<div class="wb-sec-def">
<!-- SecNavStart -->
				<section>
				<ul>
				<?php   /* Widgetized sidebar, if you have the plugin installed. */ 
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left_column') ) { ?>
			<li style="display: none;"><?php _e("<!--:en-->\"Widgetized sidebar\" not supported<!--:--><!--:fr-->&laquo;&#160;<span lang=\"en\">Widgetized sidebar</span>&#160;&raquo; n'est pas soutenu<!--:-->"); ?></li>
				</ul>
			<?php /* If it's homepage */ if ( is_home() || is_page() ) { ?>
			<h3><?php _e("<!--:en-->Meta<!--:--><!--:fr-->Méta<!--:-->"); ?></h3>
			<ul>
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
			<?php } else { ?></ul>
					<?php } ?>
				</section>
			</div>
		</nav>
		</div></div>
		<!-- 3 column page layout deprecated -->
<?php
} else {
  
?>
		<div id="wb-sec"><div id="wb-sec-in"><nav role="navigation"><h2 id="wb-nav"><?php _e("<!--:en-->Secondary menu<!--:--><!--:fr-->Menu secondaire<!--:-->"); ?></h2>
<div class="wb-sec-def">
<!-- SecNavStart -->
				<section>
					<ul>
					<?php   /* Widgetized sidebar, if you have the plugin installed. */ 
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left_column') ) { ?>
						<li style="display: none;"><?php _e("<!--:en-->\"Widgetized sidebar\" not supported<!--:--><!--:fr-->&laquo;&#160;<span lang=\"en\">Widgetized sidebar</span>&#160;&raquo; n'est pas soutenu<!--:-->"); ?></li>
					</ul>
				<?php /* If it's homepage */ if ( is_home() || is_page() ) { ?>
					<h3><?php _e("<!--:en-->Meta<!--:--><!--:fr-->Méta<!--:-->"); ?></h3>
					<ul>
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
				<?php } else { ?></ul>
				<?php } ?>
				</section>
			</div>
		</nav>
		</div></div>
		<!-- Side navigation (left column) ends / Fin de la navigation latérale (colonne gauche) -->
	</div></div>
	<!-- Columns end / Fin des colonnes -->
<?php
}
?>