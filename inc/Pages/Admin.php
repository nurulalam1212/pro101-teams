<?php 
/**
 * @package pro101-teams
 * */ 

 namespace Inc\Pages;
 
 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;
 
 class Admin extends BaseController
 {
    public $settings;

    public $pages; 

    public function __construct()
    {
        $this->settings = new SettingsApi();
        $this->pages = [
            [
                'page_title' => 'Pro Team',
                'menu_title' => 'Pro Team',
                'capability' => 'manage_options',
                'menu_slug' =>'pro101-teams',
                'callback' => function(){ echo "<h1> Dashboard page </h1>"; },
                'icon_url' => 'dashicons-buddicons-buddypress-logo',
                'position' => 5
            ],
        ];
        $this->subpages = [
            [
                'parent_slug' =>  'pro101-teams',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' =>'pro-teams-cpt',
                'callback' => function(){ echo "<h1> CPT Manager </h1>"; },
            ],
            [
                'parent_slug' =>  'pro101-teams',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' =>'pro-teams-taxo',
                'callback' => function(){ echo "<h1> Taxonomy Manager </h1>"; },
            ],
            [
                'parent_slug' =>  'pro101-teams',
                'page_title' => 'About Us',
                'menu_title' => 'About',
                'capability' => 'manage_options',
                'menu_slug' =>'pro-teams-about',
                'callback' => function(){ echo "<h1> About Us </h1>"; },
            ],
        ];
    }

    public function register()
    {
        $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages( $this->subpages )->register();
    }
 }