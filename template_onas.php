<?php
/*
Template Name: O nas
*/
?>
<?php query_posts("page_id=5"); ?>
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
    <div class="aboutus-box">
        <div id="aboutUs-section" class="section">
            <div class="page-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(get_field("logo") != ""): ?>
                        <img class="subLogo" src="<?php the_field("logo"); ?>" alt="" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <h2 class="title white"><?php the_title(); ?></h2>
            <div class="page-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="desc"><?php the_content(); ?></div>
                    </div>
                </div>
                <div class="scroolBottom white slidenext" data-next="go-uslugi"></div>
            </div>
        </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>