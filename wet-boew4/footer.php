    <footer role="contentinfo" id="wb-info" class="visible-md visible-lg">
        <div class="container">
            <nav role="navigation">
                <h2><?php _e("<!--:en-->Site Information<!--:--><!--:fr-->Informations sur le site<!--:-->"); ?></h2> 
                <ul id="gc-tctr" class="list-inline">
                    <li><a rel="license" href="http://wet-boew.github.io/wet-boew/License-<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>.html"><?php _e("<!--:en-->Terms and conditions<!--:--><!--:fr-->Avis<!--:-->"); ?></a>
                    </li>
                    <li><a href="http://www.tbs-sct.gc.ca/pd-dp/index-<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>.asp"><?php _e("<!--:en-->Transparency<!--:--><!--:fr-->Transparence<!--:-->"); ?></a>
                    </li>
                </ul>
                <div class="row">
                    <section class="col-sm-3">
                        <h3><?php _e("<!--:en-->About<!--:--><!--:fr-->À propos<!--:-->"); ?></h3> 
                        <ul class="list-unstyled">
                            <li><a href="http://wet-boew.github.io/v4.0-ci/index-<?php _e("<!--:en-->en.html#about<!--:--><!--:fr-->fr.html#apropos<!--:-->"); ?>"><?php _e("<!--:en-->About the Web Experience Toolkit<!--:--><!--:fr-->À propos de la Boîte à outils de l’expérience Web<!--:-->"); ?></a>
                            </li>
                            <li><a href="http://www.tbs-sct.gc.ca/ws-nw/index-<?php _e("<!--:en-->eng<!--:--><!--:fr-->fra<!--:-->"); ?>.asp"><?php _e("<!--:en-->About the Web Standards<!--:--><!--:fr-->À propos des normes Web<!--:-->"); ?></a>
                            </li>
                        </ul>
                    </section>
                    <section class="col-sm-3">
                        <h3><?php _e("<!--:en-->Contact us<!--:--><!--:fr-->Contactez-nous<!--:-->"); ?></h3> 
                        <ul class="list-unstyled">
                            <li><a href="https://github.com/wet-boew/wet-boew/issues/new">Questions or comments?</a>
                            </li>
                        </ul>
                    </section>
                    <section class="col-sm-3">
                        <h3><?php _e("<!--:en-->News<!--:--><!--:fr-->Nouvelles<!--:-->"); ?></h3> 
                        <ul class="list-unstyled">
                            <li><a href="https://github.com/wet-boew/wet-boew/pulse">Recent project activity</a>
                            </li>
                            <li><a href="https://github.com/wet-boew/wet-boew/graphs">Project statistics</a>
                            </li>
                        </ul>
                    </section>
                    <section class="col-sm-3">
                        <h3><?php _e("<!--:en-->Stay connected<!--:--><!--:fr-->Restez branchés<!--:-->"); ?></h3> 
                        <ul class="list-unstyled">
                            <li><a href="https://twitter.com/WebExpToolkit">Twitter</a>
                            </li>
                        </ul>
                    </section>
                </div>
            </nav>
        </div>
        <div id="gc-info">
            <div class="container">
                <nav role="navigation">
                    <h2><?php _e("<!--:en-->Government of Canada footer<!--:--><!--:fr-->Pied de page du gouvernement du Canada<!--:-->"); ?></h2> 
                    <ul class="list-inline">
                        <li><a href="http://healthycanadians.gc.ca/index-<?php _e("<!--:en-->eng<!--:--><!--:fr-->fra<!--:-->"); ?>.php"><span><?php _e("<!--:en-->Health<!--:--><!--:fr-->Santé<!--:-->"); ?></span><?php _e("<!--:en-->healthycanadians.gc.ca<!--:--><!--:fr-->canadiensensante.gc.ca<!--:-->"); ?></a>
                        </li>
                        <li><a href="http://www.travel.gc.ca/index-<?php _e("<!--:en-->eng<!--:--><!--:fr-->fra<!--:-->"); ?>.asp"><span><?php _e("<!--:en-->Travel<!--:--><!--:fr-->Voyage<!--:-->"); ?></span><?php _e("<!--:en-->travel.gc.ca<!--:--><!--:fr-->voyage.gc.ca<!--:-->"); ?></a>
                        </li>
                        <li><a href="http://www.servicecanada.gc.ca/eng/home.shtml"><span>Service Canada</span>servicecanada.gc.ca</a>
                        </li>
                        <li><a href="http://<?php _e("<!--:en-->www.jobbank.gc.ca/intro-eng.aspx<!--:--><!--:fr-->www.guichetemplois.gc.ca/accueil-fra.do?lang=fra<!--:-->"); ?>"><span><?php _e("<!--:en-->Jobs<!--:--><!--:fr-->Emplois<!--:-->"); ?></span><?php _e("<!--:en-->jobbank.gc.ca<!--:--><!--:fr-->www.guichetemplois.gc.ca<!--:-->"); ?></a>
                        </li>
                        <li><a href="http://actionplan.gc.ca/<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>"><span><?php _e("<!--:en-->Economy<!--:--><!--:fr-->Économie<!--:-->"); ?></span><?php _e("<!--:en-->actionplan.gc.ca<!--:--><!--:fr-->plandaction.gc.ca<!--:-->"); ?></a>
                        </li>
                        <li id="canada-ca"><a href="http://www.canada.ca/<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>/index.html">Canada.ca</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
    <!--[if gte IE 9 | !IE ]><!-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/dist/js/wet-boew.min.js"></script>
    <!--<![endif]-->
    <!--[if lt IE 9]><script src="<?php bloginfo('template_directory'); ?>/dist/js/ie8-wet-boew2.min.js"></script><![endif]-->
    
<?php wp_footer(); ?>
</body>

</html>
