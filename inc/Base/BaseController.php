<?php 
/**
 * @package pro101-teams
 * */ 

 namespace Inc\Base;

 class BaseController
 {
    public $plugin_path; 
    public $plugin_url; 
    public $plugin;

    function __construct()
    {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) ); //gets the full directory link , 2 means we are 2 folder deep inside
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) ); //gets full link to the plugin file, 2 means we are two folder deep inside
        $this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/pro101-teams.php'; //gets dirname , 3 means it should go 3 folders deep, that brings dirname. we need dirname/filename.php so we are concatenating the file name
    }
 }