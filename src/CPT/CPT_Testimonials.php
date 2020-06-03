<?php

namespace Motionlab\Sauce\CPT;

class CPT_Testimonials extends CPTBase
{

    // Set CPT options.
    protected $name       = "Testimonials"; // Name of the CPT on Registration
    protected $group      = "Testimonials";
    protected $singular   = "Testimonial";
    protected $plural     = "Testimonials";
    protected $dashicon   = "dashicons-universal-access";
    protected $taxonomies = [];

    public static $acf = array(
        'key' => 'group_5de527c43a866',
        'title' => 'CPT - Testimonials',
        'fields' => array(
            array(
                'key' => 'field_5de527f826315',
                'label' => 'Content',
                'name' => 'testimonial_content',
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
                'key' => 'field_5de5280526316',
                'label' => 'Reviewer Name',
                'name' => 'testimonial_reviewer_name',
                'type' => 'text',
                'instructions' => 'Who wrote this testimonial?',
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
                'key' => 'field_5de5284c26317',
                'label' => 'Date',
                'name' => 'testimonial_date',
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
                'key' => 'field_5de5289526318',
                'label' => 'Star Rating',
                'name' => 'testimonial_star_rating',
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
                'key' => 'field_5de528e726319',
                'label' => 'Treatment',
                'name' => 'testimonial_treatment',
                'type' => 'post_object',
                'instructions' => 'Which treatment is this testimonial related to?',
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
                    'value' => 'testimonials',
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
            return __DIR__ . "/single-testimonials.php";
        }

        return $single;
    }
}