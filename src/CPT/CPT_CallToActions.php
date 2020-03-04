<?php

namespace Motionlab\Sauce\CPT;

class CPT_CallToActions extends CPTBase
{

    // Set CPT options.
    protected $name       = "CTAs"; // Name of the CPT on Registration
    protected $group      = "CTAs";
    protected $singular   = "CTA";
    protected $plural     = "CTAs";
    protected $dashicon   = "dashicons-warning";
    protected $taxonomies = [];

    public static $acf = array();

    public function registerSingleTemplate($single) { return $single; }

    /**
     * GET TAXONOMIES DETAILS
     * This function returns an array of taxonomies for registation.
    */
    public function get_taxonomies_details()
    {
        return [];
    }
}
