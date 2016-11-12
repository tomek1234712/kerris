<?php get_header(); ?>
<div class="page-bg1">    
    <div id="topBar" class="navbar-inverse">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#general-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="page-wrap" style="z-index: 9999999;">
            <div class="row">
                <div class="col-md-2">
                    <a href="<?php echo site_url(); ?>" class="logo"></a>
                </div>
                <div class="col-md-8">
                    <div id="general-menu">
                        <nav class="main-nav-header">
                            <?php
                            $defaults = array(
                                'theme_location'  => 'header',
                                'container'       => 'div',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'menu-header table-row',
                                'menu_id'         => '',
                                'echo'            => true,
                            );
                            wp_nav_menu($defaults);
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="#" class="fb"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-bg1a" id="go-onas">
        <?php get_template_part("template_onas"); ?>
    </div>
</div>
<div class="page-bg2" id="go-uslugi">
    <?php get_template_part("template_uslugi"); ?>
</div>
    <?php get_template_part("template_produkty"); ?>
<div class="page-bg4">
    <?php get_template_part("template_portfolio"); ?>
</div>
    <?php get_template_part("template_kontakt"); ?>
<div id="slideMask" class="close2"></div>
<?php get_footer(); ?>