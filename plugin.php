<?php
/*
Plugin Name: YOURLS PPI Jerman Plugin
Plugin URI: https://github.com/ppijerman/yourls-ppij
Description: Custom plugin for PPI Jerman
Version: 0.1
Author: PPI Jerman
Author URI: https://ppijerman.org/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// 'keyword' provided ('abc' in 'http://sho.rt/abc') but not found
yourls_add_action('redirect_keyword_not_found', 'ppij_redirect_not_found');

// 'keyword+' provided but this isnt an existing stat page
yourls_add_action('infos_keyword_not_found', 'ppij_redirect_not_found');

// 'keyword' not provided: direct attempt at http://sho.rt/yourls-go.php or -infos.php
yourls_add_action('redirect_no_keyword', 'ppij_redirect_not_found');
yourls_add_action('infos_no_keyword', 'ppij_redirect_not_found');

// Add action if the loader failed
yourls_add_action('loader_failed', 'ppij_redirect_not_found');

function ppij_redirect_not_found() {
    yourls_redirect('https://ppijerman.org', 302);
    die();
}
