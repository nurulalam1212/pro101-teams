<?php 
/**
 * @package pro101-teams
 * */ 

/**
 * Plugin Name: Pro Team Member
 * Description: A basic wordpress <strong>team member</strong> plugin. This plugin allows you to add team members and display them on the frontend.
 * Author: Pro101
 * Author URI: https://pro101.net
 * Plugin URI: https://github.com/nurulalam1212/pro101-teams
 * Version: 1.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Text Domain: pro101-teams
 * License: GPL v2 or later
 * Pro Team Member is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version.
 * Pro Team Member is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with Pro Team Member. If not, see https://www.gnu.org/licenses/gpl-2.0.html. 
 * */  

if ( ! defined ('ABSPATH') ) {
    die ('Direct access not ok! ');
}

// load autoload file
if ( file_exists ( plugin_dir_path(__FILE__). 'vendor/autoload.php' ) ) {
    require_once plugin_dir_path(__FILE__). 'vendor/autoload.php';
}

/**
 * pro101_teams_plugin_activation
 * Activates the plugin by statically calling the activation method
 * @return void
 */
function pro101_teams_plugin_activation() 
{
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'pro101_teams_plugin_activation');

/**
 * pro101_teams_plugin_deactivation
 * Deactivates the plugin by statically calling the deactivation method
 * @return void
 */
function pro101_teams_plugin_deactivation() 
{
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'pro101_teams_plugin_deactivation');

//if class exists within the namespace\\ClassName 
if ( class_exists ( 'Inc\\Init' ) ) {
    Inc\Init::register_services(); 
}