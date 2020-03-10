<?php 
/**
 * @package pro101-teams
 * */ 

 namespace Inc\Base;

 class Activate
 {
    public static function activate()
    {
        flush_rewrite_rules();
    }
 }