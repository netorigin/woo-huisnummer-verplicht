<?php
/*
 * Plugin Name: WooCommerce huisnummer verplicht
 * Plugin URI: https://www.netorigin.nl/
 * Description: Lorem ipsim
 * Author: Timothy Morgan
 * Version: 1.0.0
 * Author URI: https://netorigin
 * Text Domain: woo-huisnummer-verplicht
 * Domain Path: /languages
 * WC requires at least: 3.0
 * WC tested up to: 5.1.0
 * License:
*/

add_action('woocommerce_checkout_process', 'custom_validation_process');
  
function custom_validation_process() {
    global $woocommerce;
  
    if(isset($_POST['billing_address_1']) and $_POST['billing_address_1'] != '')
    {
        if (!preg_match('/([0-9]+)/Uis', $_POST['billing_address_1']))
        {
            if(function_exists('wc_add_notice'))
                wc_add_notice( __('Om je pakketje te bezorgen hebben we ook je huisnummer nodig. Voeg deze toe in het adresveld.'), 'error' );
            else
                $woocommerce->add_error( __('Om je pakketje te bezorgen hebben we ook je huisnummer nodig. Voeg deze toe in het adresveld.') );
        }
    }
    
    if(isset($_POST['ship_to_different_address']))
    {
        if(isset($_POST['shipping_address_1']) and $_POST['shipping_address_1'] != '')
        {
            if (!preg_match('/([0-9]+)/Uis', $_POST['shipping_address_1']))
            {
                if(function_exists('wc_add_notice'))
                    wc_add_notice( __('Om je pakketje te bezorgen hebben we ook je huisnummer nodig. Voeg deze toe in het adresveld.'), 'error' );
                else
                    $woocommerce->add_error( __('Om je pakketje te bezorgen hebben we ook je huisnummer nodig. Voeg deze toe in het adresveld.') );
            }
        }
    }
}
