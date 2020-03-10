<?php 
/**
 * this class will help us to tap into wordpress settings API
 * @package pro101-teams
 * */ 

 namespace Inc\Api;

 class SettingsApi
 {
    public $admin_pages = [];
    public $admin_subpages = [];

    public function register()
    {
        if ( ! empty($this->admin_pages ) ) {
            add_action('admin_menu', [$this, 'addAdminMenu'] );
        }
    }

    public function addPages ( array $pages ) 
    {
        $this->admin_pages = $pages;
        return $this;
    }
    
    public function withSubPage ( string $title = null ) {
        if ( empty($this->admin_pages ) ) { 
            return $this; //if there is no admin page return as it is
        }
        $admin_page = $this->admin_pages[0]; //get the first admin page
        $subpage = [
            [
                'parent_slug' =>  $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' =>$admin_page['menu_slug'],
                'callback' => $admin_page['callback'],
            ],
        ];
        $this->admin_subpages = $subpage;

        return $this;
    }

    public function addSubPages ( array $pages ) 
    {
        $this->admin_subpages = array_merge( $this->admin_subpages, $pages ); //merge two arrays into one.. 1) dash board 2) rest of the sub pages 
        return $this;
    }

    public function addAdminMenu()
    {
        foreach($this->admin_pages as $page){
            add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
        }
        foreach($this->admin_subpages as $page){
            add_submenu_page($page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback']);
        }
    }
 }