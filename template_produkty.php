<?php
/*
Template Name: Produkty
*/
?>
<?php query_posts("page_id=7"); ?>
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
    <div class="products-box" id="go-produkty">
        <div id="products-section" class="section">
            <h2 class="title white"><?php the_title(); ?></h2>
            <div class="page-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <?php $product_list = get_field("lista_produktow"); ?>
                        <?php if(count($product_list) > 0): ?>
                        <div class="products-list-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php foreach($product_list as $product): ?>
                                        <?php if($product['kolumna'] == "lewa"): ?>
                                          <div class="product-item">
                                              <h3 class="product-item-title" style="background-image: url(<?php echo $product['ikona']; ?>);"><?php echo $product['tytul']; ?></h3>
                                              <div class="desc"><?php echo $product['tresc']; ?></div>
                                          </div>
                                        <?php endif; ?>
                                     <?php endforeach; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php foreach($product_list as $product): ?>
                                        <?php if($product['kolumna'] == "prawa"): ?>
                                          <div class="product-item">
                                              <h3 class="product-item-title" style="background-image: url(<?php echo $product['ikona']; ?>);"><?php echo $product['tytul']; ?></h3>
                                              <div class="desc"><?php echo $product['tresc']; ?></div>
                                          </div>
                                        <?php endif; ?>
                                     <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="scroolBottom white slidenext" data-next="go-portfolio"></div>
            </div>
        </div>
    </div>
    <div class="bottomArr"></div>
    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>