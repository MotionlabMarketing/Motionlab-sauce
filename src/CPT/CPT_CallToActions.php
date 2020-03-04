<?php

namespace Motionlab\Sauce\CPT;

class CPT_CallToActions extends CPTBase
{

    // Set CPT options.
    private $name       = "CTAs"; // Name of the CPT on Registration
    private $group      = "CTAs";
    private $singular   = "CTA";
    private $plural     = "CTAs";
    private $dashicon   = "dashicons-warning";
    private $taxonomies = [];

    public static $acf = array();

    /**
     * GET TAXONOMIES DETAILS
     * This function returns an array of taxonomies for registation.
    */
    public function get_taxonomies_details()
    {
        return [];
    }
}
