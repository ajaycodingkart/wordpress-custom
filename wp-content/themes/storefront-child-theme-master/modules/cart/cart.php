<?php

/**
 * @class    Cart
 * @category Class
 * @author   Ganesh pawar
 * */
class Cart {

    protected static $_instance = null;
    public $glSettings = array();

    public static function get_instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        $this->hooks();
        $this->glSettings = $this->get_general_option();
    }

    public function hooks() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles_scripts'),99);
    }

    /*
     * use this function load admin setting for this module only
     */

    public function get_general_option() {
        $setting = array();
        return $setting;
    }

    /*
     * Enqueue stylesheets n javascript only for this module only
     */

    public function enqueue_styles_scripts() {
        if (  is_cart() ){
            // *************************  stylesheets ******************/
            wp_enqueue_style('cart_style', get_stylesheet_directory_uri() . '/modules/cart/css/style.css');

            // ************************  stylesheets ******************/
            // ********************** javascript ********************* /
            wp_enqueue_script('cart_script', get_stylesheet_directory_uri() . '/modules/cart/js/script.js', array('jquery'));
            // ********************** javascript  ********************* /
        }
    }

}


function ck_cart_object() {
    return Cart::get_instance();
}

ck_cart_object();
