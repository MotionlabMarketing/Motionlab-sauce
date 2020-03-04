<?php

namespace Motionlab\Sauce\CPT;

class CPT_Jobs extends CPTBase
{

    // Set CPT options.
    protected $name       = "Jobs"; // Name of the CPT on Registration
    protected $group      = "Jobs";
    protected $singular   = "Job";
    protected $plural     = "Jobs";
    protected $dashicon   = "dashicons-businessman";
    protected $taxonomies = [];

    public static $acf = array(
        'key' => 'group_5de529d5a97c7',
        'title' => 'CPT - Jobs',
        'fields' => array(
            array(
                'key' => 'field_5de52a2e1545e',
                'label' => 'Role Title',
                'name' => 'job_role_title',
                'type' => 'text',
                'instructions' => '',
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
                'key' => 'field_5de52a3d1545f',
                'label' => 'Role ID',
                'name' => 'job_role_id',
                'type' => 'text',
                'instructions' => '',
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
                'key' => 'field_5de52a4715460',
                'label' => 'Role Salary',
                'name' => 'job_role_salary',
                'type' => 'text',
                'instructions' => '',
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
                'key' => 'field_5de52a5215461',
                'label' => 'Expiry Date',
                'name' => 'job_expiry_date',
                'type' => 'date_time_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y g:i a',
                'return_format' => 'D j F, Y g:i a',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_5de5323e15462',
                'label' => 'Role Description',
                'name' => 'job_role_description',
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
                'key' => 'field_5de5325115463',
                'label' => 'Submission Form',
                'name' => 'job_submission_form',
                'type' => 'ninja_forms_field',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'allow_null' => 0,
                'allow_multiple' => 0,
            ),
            array(
                'key' => 'field_5de5326815464',
                'label' => 'Location',
                'name' => 'job_location',
                'type' => 'post_object',
                'instructions' => 'If left empty, no location will be listed on the job vacancies block or the full job listing.',
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
                'return_format' => 'id',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'jobs',
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
            return __DIR__ . "/single-jobs.php";
        }

        return $single;
    }

    /**
     * GET TAXONOMIES DETAILS
     * This function returns an array of taxonomies for registation.
     */
    public function get_taxonomies_details()
    {
        return array(
            array(
                'plural' => "Job Types",
                'singular' => "Job Type",
                'terms' => array(
                    array(
                        'name' => "Full Time",
                        'alias_of' => '',
                        'description' => '',
                        'parent' => '',
                        'slug' => 'full-time'
                    ),
                    array(
                        'name' => "Part Time",
                        'alias_of' => '',
                        'description' => '',
                        'parent' => '',
                        'slug' => 'part-time'
                    )
                )
            )
        );
    }
}
