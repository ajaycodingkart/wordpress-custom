<?php

/**
 * @class    SingleProduct
 * @category Class
 * @author   Ganesh pawar
 * */
class SingleProduct {

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

        remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
        remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
        remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
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
        if (  is_single() ){
            // *************************  stylesheets ******************/
            wp_enqueue_style('cart_style', get_stylesheet_directory_uri() . '/modules/cart/css/style.css');

            // ************************  stylesheets ******************/
            // ********************** javascript ********************* /
            wp