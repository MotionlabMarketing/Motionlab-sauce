<?php

namespace Motionlab\TogetherDentalGroup\Menus;

class MenuLocator
{
    public function __construct()
    {
        $this->bootstrap();
    }

    private function bootstrap()
    {
        \register_nav_menus(array(
            'header_group' => 'Header – Group',
            'header_main_desktop' => 'Header – Main (Desktop)',
            'header_main_mobile' => 'Header – Main (Mobile)',
            'footer_legal' => 'Footer – Legal',
            'footer_locations' => 'Footer – Locations',
            'footer_treatments' => 'Footer – Treatments',
            'footer_group' => 'Footer – Group',
        ));
    }

    public function get_nav_menu_items_by_location($location, $args = [])
    {

        // Get all locations
        $locations = \get_nav_menu_locations();

        // Get object id by location
        $object = \wp_get_nav_menu_object($locations[$location]);

        // Get menu items by menu name
        $menu_items = \wp_get_nav_menu_items($object->name, $args);

        // Render a menu list
        $return = "";
        if (count($menu_items) > 0) {
            $return .= "<nav class='inherit {$location}'><ul class='clearfix mt0 p0 list-reset mb0 inherit'>";
            foreach ($menu_items as $key => $value) {
                $return .= "<li class='mr2 inherit'><a href='{$value->url}' class='inherit' title='{$value->title}'>";
                $return .= "{$value->title}";
                $return .= "</li></a>";
            }
            $return .= "</ul></nav>";
        }

        // Return menu post objects
        return $return;
    }
    
    // public function buildMenu($args)
    // {
    //     include("Menus/menu-{$args}.php");
    // }
}
