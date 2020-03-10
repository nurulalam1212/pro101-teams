<?php 
/**
 * @package pro101-teams
 * */ 

 namespace Inc\Base;

 use \Inc\Base\BaseController;

 class SettingsLink extends BaseController
 {
    public function register()
    {
        add_filter('plugin_action_links_'.$this->plugin, [$this, 'add_settings_link']);
        add_filter('admin_footer_text',[$this, 'get_debug']);
    }
    public function add_settings_link($links)
    {
        $settings_link = '<a href="/admin.php?page=pro101-teams-settings">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
    public function get_debug($text)
    {
        $text = $this->plugin;
        return $text;
    }
 }