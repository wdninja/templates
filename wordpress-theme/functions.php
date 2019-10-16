<?php

//Enqueue Stylesheets
function wp_theme_styles() {
    //wp_enqueue_style( 'googlefonts_css', '' );
    //wp_enqueue_style( 'slick_css', get_template_directory_uri() . '/js/vendor/slick/slick.css' );
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/main.css' );
}
add_action( 'wp_enqueue_scripts', 'wp_theme_styles' );

//Enqueue Scripts
function wp_theme_js() {
	wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/libs/modernizr-2.8.3-custom.js', '', '', false );
    //wp_enqueue_script( 'slick_js', get_template_directory_uri() . '/js/vendor/slick/slick.min.js', '', '', true );
    //wp_enqueue_script( 'parallax_js', get_template_directory_uri() . '/js/vendor/parallax.min.js', '', '', true );
    //wp_enqueue_script( 'aniview_js', 'https://unpkg.com/jquery-aniview/dist/jquery.aniview.js', '', '', true );
	wp_enqueue_script( 'script_js', get_template_directory_uri() . '/js/script.js', array('jquery'), '', false );
}
add_action( 'wp_enqueue_scripts', 'wp_theme_js' );

//Add support for Menus
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'main-navigation' => __( 'Main Navigation' ),
            'footer-navigation' => __( 'Footer Navigation' ),
            'mobile-navigation' => __( 'Mobile Navigation' )
		)
	);
}

//Main Navigation Walker
class Main_Nav_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>";
	}
}

//Add support for Featured Images
add_theme_support('post-thumbnails');

//Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        /* body.login {
            background: #131212;
        }
        #login h1 a, .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg');
            background-size: 76px 85px;
            padding-bottom: 16px;
            width: 76px;
            height: 85px;
        }
        .login #loginform {
            background: #F7F5EC;
        }
        .login #loginform input:focus {
            border-color: #C70000;
            box-shadow: 0 0 2px rgba(199,0,0,.8);
        }
        .login #loginform input[type=checkbox]:checked:before {
            color: #DF0000;
        }
        .login #loginform .button-primary {
            background: #DF0000;
            border: 0;
            text-shadow: none;
            box-shadow: none;
            transition: 0.2s ease background-color;
        }
        .login #loginform .button-primary:hover {
            background: #C70000;
        }
        .login #nav a,
        .login #backtoblog a {
            color: #7c7c7c;
            transition: 0.2s ease color;
        }
        .login #nav a:hover,
        .login #backtoblog a:hover {
            color: #DF0000!important;
        } */
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

//Replaces the excerpt text
function new_excerpt_more($more) {
    global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Add class to current archive
function get_archives_link_mod ( $link_html ) {
preg_match ("/href='(.+?)'/", $link_html, $url);
$requested = "http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}";
if (trim($requested) == trim($url[1])) {
$link_html = str_replace("<li>", "<li class='current'>", $link_html);
}
return $link_html;
}
add_filter("get_archives_link", "get_archives_link_mod");

//ACF Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

?>
