<?php

/*
Plugin Name: Confannoyance
Plugin URI:  http://techand.coffee/confannoyance/
Plugin Author: Dennis
Description: Annoys people trying to download wp-config.php
Version:     0.1
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

namespace confannoyance;

define( 'CONFANNOYANCE_VERSION', 0.1 );
define( 'CONFANNOYANCE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CONFANNOYANCE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if(function_exists('add_action')) {
  add_action('wp', '\confannoyance\check_inputs', 0);
}

function check_inputs() {
    foreach($_REQUEST as $k => $v) {
      if(strpos($v, '../wp-config.php') !== false) {
        display_fake_wpconfig();
      }
    }
}

function display_fake_wpconfig() {
    error_log("Annoying requester of " . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);

    include __DIR__ . '/fake-wp-config.php';
    status_header(200);
    die();
}
