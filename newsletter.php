<?php
/*
Plugin Name: newsletter subscribe pluigin
Description: plugin keep users know your news
Author: assem Elshukfy
Version: 1.0
Author URI: http://assem.hostkda.com/?i=1#
*/


if(!defined('ABSPATH')){
	exit;
}

require_once(plugin_dir_path(__FILE__).'/includes/newsletterScripts.php');

require_once(plugin_dir_path(__FILE__).'/includes/newsletter_widget.php');


add_action( 'widgets_init', function(){
	register_widget( 'newsletter_subscribe' );
});

