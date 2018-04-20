<?php
/*
Plugin Name: WP Nonce Object example
Plugin URI: https://github.com/displaynone/wordpress-nonce-object
Description: Helps using WP nonce in an object orientated environment
Author: Luis Sacristán
Version: 1.0.0
Author URI: http://sentidoweb.com
*/

namespace WpNounces;

class Nacho {

    public function hasCheese($bool = true)  
    {  
        return $bool;  
    }

}  