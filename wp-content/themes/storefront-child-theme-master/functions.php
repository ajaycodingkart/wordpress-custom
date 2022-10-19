<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */

/**
 * Dequeue the Storefront Parent theme core CSS
 */


/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */
// add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
// function enqueue_styles() {
//     wp_enqueue_style( 'storefront-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce/woocommerce.css', array( 'storefront-icons' ), $storefront_version );
//     wp_enqueue_style( 'storefront-child-style', get_stylesheet_directory_uri() . '/style.css', '', $storefront_version );
// }

// add_action( 'wp_enqueue_scripts', 'dequeue_styles', 99 );
// function dequeue_styles() {
//     wp_dequeue_style( 'storefront-style' );
// }

/* ------------------------------------------------------ */
/* Load Codingkart Modules  */
/* ------------------------------------------------------ */
require_once 'modules/included_files.php';



/* ------------------------------------------------------ */
  /* remove_storefront_sidebar */
  /* remove_storefront_post_header */
  /* remove_storefront_post_content */
  /* remove_storefront_post_taxonomy */
/* ------------------------------------------------------ */

function bake_my_wp_remove_storefront_sidebar() {
    remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
    remove_action( 'storefront_loop_post', 'storefront_post_header', 10 );
    remove_action( 'storefront_loop_post', 'storefront_post_content', 30 );
    remove_action( 'storefront_loop_post', 'storefront_post_taxonomy', 40 );
}
add_action( 'get_header', 'bake_my_wp_remove_storefront_sidebar' );
/*-------------------------------
  remove_storefront_sidebar end 
--------------------------------*/



/*-------------------------------
  global add css and js start 
--------------------------------*/

add_action('wp_enqueue_scripts', 'add_theme_script', 1);
function add_theme_script() {
    
    // 	-----------------------------Font Family -----------------
    wp_enqueue_style('font-Lato-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap', array(), '1.1', 'all');
    
    // 	----------------------------- slick slider css -----------------

    wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(),  'all');
    wp_enqueue_style('slick-theme-css', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css', array(), '1.1', 'all');

    // 	----------------------------- style css  -----------------

    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), 'all');

    // 	----------------------------- script js  -----------------

    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'),  true);
    
    // 	----------------------------- slick slider js -----------------
    
    wp_enqueue_script('slick-script-js', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'),  true);

}
 /*-------------------------------
  global add css and js end
--------------------------------*/
