<?php

namespace Motionlab\Sauce\CPT;

class CPT_CaseStudies extends CPTBase
{

    // Set CPT options.
    protected $name       = "Case Studies"; // Name of the CPT on Registration
    protected $group      = "Case Studies";
    protected $singular   = "Case Study";
    protected $plural     = "Case Studies";
    protected $dashicon   = "dashicons-id-alt";
    protected $taxonomies = [];

    public static $acf = array(
        'key' => 'group_5de1361b98501',
        'title' => 'CPT - Case Studies',
        'fields' => array(
            array(
                'key' => 'field_5de7cb9f9267e',
                'label' => 'Introduction',
                'name' => 'case_study_introduction',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5de13626abc25',
                'label' => 'Content',
                'name' => 'case_study_content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5de13649abc27',
                'label' => 'Practice',
                'name' => 'case_study_practice',
                'type' => 'post_object',
                'instructions' => 'Leave blank to use the currently loaded practice (including the group site)',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'locations',
                ),
                'taxonomy' => '',
                'allow_null' => 1,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
            array(
                'key' => 'field_5de1377dabc28',
                'label' => 'Date',
                'name' => 'case_study_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y',
                'return_format' => 'D F j, Y',
                'first_day' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'casestudies',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'the_content',
            1 => 'excerpt',
            2 => 'discussion',
            3 => 'comments',
        ),
        'active' => true,
        'description' => '',
    );

    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == strtolower(str_replace(' ', '', $this->name))) {
            return __DIR__ . "/single-casestudies.php";
        }

        return $single;
    }

    /**
     * GET TAXONOMIES DETAILS
     * This function returns an array of taxonomies for registation.
     */
    public function get_taxonomies_details()
    {

    }
}