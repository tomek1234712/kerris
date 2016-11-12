<?php
/*
Template Name: Kontakt
*/
?>
<?php query_posts("page_id=9"); ?>
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
    <footer id="footer">
        <h2 class="footer-title"><?php the_title(); ?></h2>
        <div class="page-wrap">
            <ul class="icons">
                <li class="big">
                    <div class="ico"><img src="<?php the_field("ikona1"); ?>" alt="" /></div>
                    <div class="desc"><?php the_field("tresc1"); ?></div>
                </li>
                <li>
                    <div class="ico"><img src="<?php the_field("ikona2"); ?>" alt="" /></div>
                    <div class="desc"><?php the_field("tresc2"); ?></div>
                </li>
                <li>
                    <div class="ico"><img src="<?php the_field("ikona3"); ?>" alt="" /></div>
                    <div class="desc"><?php the_field("tresc3"); ?></div>
                </li>
                <li>
                    <div class="ico"><img src="<?php the_field("ikona4"); ?>" alt="" /></div>
                    <div class="desc"><?php the_field("tresc4"); ?></div>
                </li>
            </ul>
        </div>
    </footer>
    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>