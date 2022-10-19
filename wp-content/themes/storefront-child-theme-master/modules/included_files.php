<?php

/**
 * @class    Included_files
 * @category Class
 * @author   Codingkart
 * */
class Included_files {

    public function __construct() {
        require_once 'helper.php';
        require_once 'cart/cart.php';
        require_once 'singleProduct/singleProduct.php';
    }
    
}

new Included_files();
