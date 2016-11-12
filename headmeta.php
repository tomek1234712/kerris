    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!--[if 9]><meta content='IE=edge' http-equiv='X-UA-Compatible'/><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo( 'name', 'display' ); ?><?php wp_title('-'); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php the_field('favicon', 'option'); ?>" />
    <?php wp_head(); ?>
    <?php get_template_part('assets/css/css_variable'); ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
    <![endif]-->
    <!--[if gte IE 9]>
        <style type="text/css">
          .gradient {
             filter: none;
          }
        </style>
    <![endif]-->
    <!-- Facebook OG -->
    <meta property="og:title" content='<?php bloginfo('name'); echo " - ".get_the_title(get_the_ID()); ?>'/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="<?php if (has_post_thumbnail()){ $domsxe = simplexml_load_string(get_the_post_thumbnail(get_the_ID())); echo $domsxe->attributes()->src;} else { the_field('logo_facebook', 'option'); } ?>" />
    <meta property="og:url" content="<?php the_permalink(get_the_ID(get_the_ID())); ?>"/>
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <!-- END: Facebook OG -->