<?php 
// Define some constants

if ( ! defined('THEME_DIR' ) ) {
    define('THEME_DIR', realpath(dirname(__FILE__)));
}

if ( ! defined('DS' ) ) {
    define('DS', DIRECTORY_SEPARATOR);
}

if ( ! defined('APP' ) ) {
    define('APP', THEME_DIR . DS . 'app');
}

if ( ! defined('ASSETS_DIR' ) ) {
    define('ASSETS_DIR', get_template_directory_uri() . '/assets');
}

require APP . DS . 'app.php';




function _addMenuSupport() {
    // add_theme_support('post-thumbnails');
    add_theme_support('menus');
}
add_action('init', '_addMenuSupport');



// load css and js
function _enqueueScripts() {
    wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' );
    wp_enqueue_style('bootstrap', ASSETS_DIR . '/css/bootstrap.css' );
    wp_enqueue_style('magic', ASSETS_DIR . '/css/magic.min.css' );
    wp_enqueue_style('normalize', ASSETS_DIR . '/css/normalize.css' );
    wp_enqueue_style('main', ASSETS_DIR . '/css/main.css' );
    wp_enqueue_style('bxslider', ASSETS_DIR . '/css/jquery.bxslider.css' );
    wp_enqueue_style('lightbox', ASSETS_DIR . '/css/lightbox.css' );
    wp_enqueue_style('font-awesome', ASSETS_DIR . '/css/font-awesome.css' );
    wp_enqueue_style('rwd', ASSETS_DIR . '/css/rwd.css' );
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', ASSETS_DIR . '/js/bootstrap.min.js', array('jquery'));
    //wp_enqueue_script('google-map-api', "https://maps.googleapis.com/maps/api/js?v=3.exp");
    wp_enqueue_script('modernizr', ASSETS_DIR . '/js/modernizr.custom.js', array('jquery'));
    wp_enqueue_script('Jsbxslider', ASSETS_DIR . '/js/jquery.bxslider.min.js', array('jquery'));
    wp_enqueue_script('lightbox', ASSETS_DIR . '/js/lightbox.min.js', array('jquery'));
    wp_enqueue_script('browserDetect', ASSETS_DIR . '/js/browserDetect.js', array('jquery'));
    //wp_enqueue_script('JSchosen', ASSETS_DIR . '/js/chosen.jquery.min.js', array('jquery'));
    //wp_enqueue_script('parallaxJs', ASSETS_DIR . '/js/parallax.min.js', array('jquery'));
    wp_enqueue_script('imagesloadedJs', ASSETS_DIR . '/js/imagesloaded.pkgd.min.js', array('jquery'));
    wp_enqueue_script('main-js', ASSETS_DIR . '/js/main.js', array('jquery'));
}
add_action('wp_enqueue_scripts', '_enqueueScripts');


// hide admin bar
add_filter('show_admin_bar', '__return_false');

// register nav menus

function _addMenuLocations() {
    register_nav_menus( array(
        'header' => 'Menu górne',
    ) );
}
add_action('init', '_addMenuLocations');

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// add image sizes

function _addImageSizes() {
    add_image_size('portfolio-item', 370, 197, true);
}

add_action('init', '_addImageSizes');


/*
 * Admin CSS
 */

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    #cpt_info_box {
      display: none;
    }
    .notice-msg.updated{
      display: none;
    }
  </style>';
}

/*
 * cleanup
 */

add_action( 'admin_menu', 'remove_menu_pages' );
function remove_menu_pages() {
	remove_menu_page('edit.php'); // Wpisy
//      remove_menu_page('upload.php'); // Media
//	remove_menu_page('link-manager.php'); //Odnośniki
	remove_menu_page('edit-comments.php'); // Komentarze
//	remove_menu_page('edit.php?post_type=page'); // Strony
//	remove_menu_page('plugins.php'); // Wtyczki
//	remove_menu_page('themes.php'); // Wygląd
//	remove_menu_page('users.php'); // Użytkownicy
//	remove_menu_page('tools.php'); // Narzędzia
//      remove_menu_page('options-general.php'); // Ustawienia
}

function tab($arr){
    echo '<pre style="border: 1px solid #797979;background: #EEEEEE;font-size: 13px;max-width: 100%;display: block;">';
    print_r($arr);
    echo '</pre>';  
}
function set_html_content_type() {
	return 'text/html';
}
function linkifyYouTubeURLs($text) {
            $text = preg_replace('~
                # Match non-linked youtube URL in the wild. (Rev:20111012)
                https?://         # Required scheme. Either http or https.
                (?:[0-9A-Z-]+\.)? # Optional subdomain.
                (?:               # Group host alternatives.
                  youtu\.be/      # Either youtu.be,
                | youtube\.com    # or youtube.com followed by
                  \S*             # Allow anything up to VIDEO_ID,
                  [^\w\-\s]       # but char before ID is non-ID char.
                )                 # End host alternatives.
                ([\w\-]{11})      # $1: VIDEO_ID is exactly 11 chars.
                (?=[^\w\-]|$)     # Assert next char is non-ID or EOS.
                (?!               # Assert URL is not pre-linked.
                  [?=&+%\w]*      # Allow URL (query) remainder.
                  (?:             # Group pre-linked alternatives.
                    [\'"][^<>]*>  # Either inside a start tag,
                  | </a>          # or inside <a> element text contents.
                  )               # End recognized pre-linked alts.
                )                 # End negative lookahead assertion.
                [?=&+%\w-]*        # Consume any URL (query) remainder.
                ~ix', 
                '$1',
                $text);
            return $text;
}
?>