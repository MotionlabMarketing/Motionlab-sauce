<?php

namespace Motionlab\TogetherDentalGroup\PageTemplates\JobsListing;

use Motionlab\TogetherDentalGroup\PageTemplates\TemplateBase;

class JobsListingTemplate extends TemplateBase
{

    public function init() {
        //Use this to collect any other information about the template.
        \add_filter('page_template', [$this, "generate"]);
        \add_filter('theme_page_templates', [$this, "load"], 10, 4);
    }

    public function load($post_templates, $wp_theme, $post, $post_type) {
        $post_templates['jobs-listing-template.php'] = __('Jobs Listing');

        return $post_templates;
    }

    public function generate( $page_template ) {
        if(get_page_template_slug() == "jobs-listing-template.php") {
            $page_template = __DIR__ . "/template.php";
        }

        return $page_template;
    }

    public function getLocations() {

        $args = array(
            'post_type' => 'locations',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $query = new \WP_Query($args);

        $locations = [];
        foreach($query->posts as $location) {
            $_location =  [];
            $_location['id'] = $location->ID;
            $_location['name'] = \get_the_title($location->ID);
            $_location['website'] = \get_field('location_website_url', $location->ID);

            $locations[] = $_location;
        }

        return $locations;

    }
}
