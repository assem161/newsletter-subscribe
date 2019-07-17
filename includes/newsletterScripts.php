<?php

function Newsletter_subscribe_widget() {
	wp_enqueue_style('s-n-styles',plugins_url().'/Newsletter-subscribe/css/swstyle.css');
	wp_enqueue_script( 's-n-mainjs', plugins_url() . '/Newsletter-subscribe/js/swmain.js', array('jquery'), true );
    /* Create Nonce */
    wp_localize_script('s-n-mainjs', 'ajax_var', array(
        'url' => plugins_url().'/Newsletter-subscribe/includes/newletter-subscribe.php',
        'nonce' => wp_create_nonce('ajax-nonce'),
    ));	

}
add_action( 'wp_enqueue_scripts', 'Newsletter_subscribe_widget' );