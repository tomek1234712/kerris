<?php if(isset($_GET['s']) && !empty($_GET['s'])): ?>
<?php get_template_part('template_search'); ?>
<?php else: ?>
<?php get_header(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="breadcrumbs-wrap"> 
                <ul><li class="opis_breadcrumb"><?php echo do_shortcode('[cml_text en="You are here:" pl="Tu jesteś:"]'); ?></li>
                    <li><a href="<?php echo site_url(); ?>"><?php echo do_shortcode('[cml_text en="home" pl="start"]'); ?></a></li>
                    <li class="separator"> » </li>
                    <li> page not found</li>
                </ul>
            </div>
            <div class="products-items">
                <h2><?php echo do_shortcode('[cml_text en="Error 404" pl="Błąd 404"]'); ?></h2>
                <p><?php echo do_shortcode('[cml_text en="Sorry, page not found." pl="Nie znaleziono strony."]'); ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <?php get_template_part("parts/right_sidebar"); ?>
        </div>
    </div>
<?php get_footer(); ?>
<?php endif; ?>