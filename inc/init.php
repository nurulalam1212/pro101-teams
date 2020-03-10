<?php 
/**
 * @package pro101-teams
 * */ 

 namespace Inc;

 final class Init
 {    
    /**
     * getServices
     * add service as an array item
     * @return array
     */
    private static function getServices()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLink::class
        ];
    }

    private static function instantiate($class) {
        $service = new $class;
        return $service;
    }

    public static function register_services()
    {
        foreach ( self::getServices() as $class ) {
            $service = self::instantiate($class);
            if ( method_exists( $service, 'register' )  ) {
                $service->register();
            }
        }
    }
 }