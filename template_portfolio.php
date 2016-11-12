<?php
/*
Template Name: Portfolio
*/
?>
<?php query_posts("page_id=8"); ?>
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
    <div class="portfolio-box">
        <div id="portfolio-section" class="section">
            <h2 class="title gray"><?php the_title(); ?></h2>
            <div class="page-wrap">
                <div class="row" id="go-portfolio">
                    <div class="col-md-12">
                        <div class="desc"><?php the_content(); ?></div>
                        <?php $portfolio_list = get_field("elementy_portfolio"); ?>
                        <?php if(count($portfolio_list) > 0): ?>
                        <div class="portfolio-slider-box">
                            <ul class="portfolio-slider">
                                <?php foreach ($portfolio_list as $portfolio_element): ?>
                                <li>
                                    <?php if($portfolio_element['acf_fc_layout'] == "obrazek"): ?>
                                        <?php $portfolioIMG = wp_get_attachment_image_src( $portfolio_element['obraz'], 'portfolio-item', false );?>
                                        <?php $portfolioIMGfull = wp_get_attachment_image_src( $portfolio_element['obraz'], 'full', false );?>
                                    <?php else: ?>
                                        <?php $portfolioIMG = wp_get_attachment_image_src( $portfolio_element['cover'], 'portfolio-item', false );?>
                                    <?php endif; ?>
                                    <div class="picture" style="background-image: url(<?php echo $portfolioIMG[0]; ?>);">
                                        <?php if($portfolio_element['acf_fc_layout'] == "obrazek"): ?>
                                        <a href="<?php echo $portfolioIMGfull[0]; ?>"  data-lightbox="image<?php echo rand(1,9999); ?>" data-title="<?php echo $portfolio_element['tytul']; ?>" class="picture-link"></a>
                                        <?php else: ?>
                                            <?php echo do_shortcode('[video_lightbox_youtube video_id="'.linkifyYouTubeURLs($portfolio_element['video_yt_link']).'" width="640" height="480" anchor="play"]');?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info">
                                        <h3><?php echo $portfolio_element['tytul']; ?></h3>
                                        <div class="sdesc"><?php echo $portfolio_element['tekst']; ?></div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="scroolBottom gray slidenext" data-next="footer"></div>
            </div>
        </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>