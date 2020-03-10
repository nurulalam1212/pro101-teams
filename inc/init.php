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
    public static function getServices()
    {
        return [
            
        ];
    }

    public static function instantiate($class) {
        $instance = new $class;
        return $instance;
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