<?php
/*
    Plugin Name: Infinite Scroll
    Plugin URI:
    Plugin Description: To add an infinite scroll questions page.
    Plugin Version: 1.0.0
    Plugin Date: 2016-09-23
    Plugin Author: 38qa.net
    Plugin Author URI: https://38qa.net/
    Plugin License: GPLv2
    Plugin Minimum Question2Answer Version: 1.7
    Plugin Update Check URI:
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}

qa_register_plugin_phrases('qa-infinite-scroll-lang-*.php', 'infinite_scroll');
qa_register_plugin_module('module', 'qa-infinite-scroll.php', 'qa_infinite_scroll', 'Infinite Scroll');

/*
    Omit PHP closing tag to help avoid accidental output
*/
