<?php 
/**
 * @package pro101-teams
 * */ 

 namespace Inc\Base;

 use \Inc\Base\BaseController;

 class Enqueue extends BaseController
 {
    public function register()
    {
        add_action('admin_enqueue_scripts', [ $this, 'backend_loadScripts' ]);
    }

    public function backend_loadScripts()
    {
        wp_enqueue_style('pro101-teams-css', $this->plugin_url . 'css/admin-style.css' );
        wp_enqueue_script('pro101-teams-js', $this->plugin_url . 'js/backend-main.js', [], false, true );
    }
 }