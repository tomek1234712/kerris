<?php
/*
Template Name: Usługi
*/
?>
<?php query_posts("page_id=6"); ?>
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
    <div class="services-box">
        <div id="services-section" class="section">
            <h2 class="title gray"><?php the_title(); ?></h2>
            <div class="page-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="desc"><?php the_content(); ?></div>
                    </div>
                </div>
                <div class="scroolBottom gray slidenext" data-next="go-produkty"></div>
            </div>
        </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>