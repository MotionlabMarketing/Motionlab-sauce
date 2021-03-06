<?php

namespace Motionlab\Sauce;

class MenuLocations
{
    
    public $menu = "";

    public function __construct()
    {
        $this->bootstrap();


    }

    private function bootstrap()
    {
        \register_nav_menus(array(
            'header_main_desktop' => 'Header – Main (Desktop)',
            'header_main_mobile' => 'Header – Main (Mobile)',
            'footer_legal' => 'Footer – Legal',
        ));
    }

    public function get_nav_menu_items_by_location($location, $args = [])
    {
        $return = "";

        // Get all locations
        $locations = \get_nav_menu_locations();

        // Get object id by location
        if(array_key_exists($location, $locations)) {
            $object = \wp_get_nav_menu_object($locations[$location]);
        } else {
            $object = false;
        }

        if($object !== false) {
            // Get menu items by menu name
            $menu_items = \wp_get_nav_menu_items($object->name, $args);

            // Render a menu list
            if (is_countable($menu_items) && count($menu_items) > 0) {
                $return .= "<nav class='inherit {$location}'><ul class='clearfix mt0 p0 list-reset mb0 inherit'>";
                foreach ($menu_items as $key => $value) {
                    // pa($value->classes);
                    $class = "mr2 inherit mb0 ";
                    if (count($value->classes) > 0) {
                        foreach ($value->classes as $key => $class_item) {
                            $class .= $class_item . " ";
                        }
                    }
                    $class = trim($class);

                    $return .= "<li class='{$class}'><a href='{$value->url}' class='inherit' title='{$value->title}'>";
                    $return .= "{$value->title}";
                    $return .= "</li></a>";
                }
                $return .= "</ul></nav>";
            }
        }

        // Return menu post objects
        return $return;
    }

    public function get_nav_menu_title_by_location($location, $args = [])
    {

        // Get all locations
        $locations = \get_nav_menu_locations();

        // Get object id by location
        $object = \wp_get_nav_menu_object($locations[$location]);

        // Get menu items by menu name

        $return = "";
        if( preg_match('/[(](.*)[)]/', $object->name, $matches) ) {
            $return = $matches[1];
        } else {
            return $object->name;
        }

        // Return menu post objects
        return $return;
    }

}
