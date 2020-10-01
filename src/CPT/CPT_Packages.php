<?php

namespace Motionlab\Sauce\CPT;

class CPT_Packages extends CPTBase
{

    // Set CPT options.
    protected $name       = "Packages"; // Name of the CPT on Registration
    protected $group      = "Packages";
    protected $singular   = "Package";
    protected $plural     = "Packages";
    protected $dashicon   = "dashicons-universal-access";
    protected $taxonomies = [];

    public function __construct()
    {
        //Register the archive template for this post type.
        \add_filter('archive_template', [$this, "registerArchiveTemplate"]);

        parent::__construct();
    }

    public static $acf = array(
        'key' => 'group_5ab527c43a866',
        'title' => 'CPT - Packages',
        'fields' => array(
            array(
                'key' => 'field_5de5abf826315',
                'label' => 'Content',
                'name' => 'package_content',
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
                'key' => 'field_5de5280523756',
                'label' => 'Reviewer Name',
                'name' => 'package_reviewer_name',
                'type' => 'text',
                'instructions' => 'Who wrote this package?',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5de5284446317',
                'label' => 'Date',
                'name' => 'package_date',
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
            array(
                'key' => 'field_5de5244426318',
                'label' => 'Star Rating',
                'name' => 'package_star_rating',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    1 => '1 Star',
                    2 => '2 Star',
                    3 => '3 Star',
                    4 => '4 Star',
                    5 => '5 Star',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5de528e243319',
                'label' => 'Treatment',
                'name' => 'package_treatment',
                'type' => 'post_object',
                'instructions' => 'Which treatment is this package related to?',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'treatments',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'packages',
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
        // do nothing special for the single template
        return $single;
    }

    public function registerArchiveTemplate($archive) {
        global $post;

        if(is_post_type_archive(strtolower(str_replace(' ', '', $this->name)))) {
            return __DIR__ . "/archive-packages.php";
        }

        return $archive;
    }
}