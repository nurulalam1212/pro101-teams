<?php 
/**
 * @package pro101-teams
 * */ 

 namespace Inc\Pages;

 class Admin extends \Inc\Base\BaseController
 {
     public function register()
     {
        add_action('admin_menu', [ $this, 'add_settings_page_to_menu' ]);
        add_action('admin_menu', [ $this, 'add_submenu_pages' ]);
     }
     public function add_submenu_pages()
     {
        add_submenu_page('pro101-teams','Team Settings', 'Team Settings', 'manage_options','pro101-teams-settings',[$this, 'get_settings_page'],1);
     }
     public function add_settings_page_to_menu()
     {
         add_menu_page('Pro Team', 'Pro Team Members', 'manage_options','pro101-teams',[$this, 'get_index_page'],'dashicons-buddicons-buddypress-logo',5);
     }
     public function get_index_page()
     {
         require_once $this->plugin_path . 'templates/admin/frontpage.php';
     }
     public function get_settings_page()
     {
         require_once $this->plugin_path . 'templates/admin/settings.php';
     }
 }