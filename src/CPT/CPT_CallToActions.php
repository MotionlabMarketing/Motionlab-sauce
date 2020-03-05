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

    public static $acf = array(
        'key' => 'group_5e32ee74688bc',
        'title' => 'CPT - CTA',
        'fields' => array(
            array(
                'key' => 'field_5e32ef0138f9f',
                'label' => 'Title',
                'name' => 'title',
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
                'key' => 'field_5e32ef0a38fa0',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
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
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5e32ef5838fa4',
                'label' => 'Type',
                'name' => 'type',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'button' => 'Button',
                    'form' => 'Form',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'button',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_5e32ef1738fa1',
                'label' => 'Button',
                'name' => 'button',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5e32ef5838fa4',
                            'operator' => '==',
                            'value' => 'button',
                        ),
                    ),
                ),
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
                'key' => 'field_5e32ef1f38fa2',
                'label' => 'Form',
                'name' => 'form',
                'type' => 'ninja_forms_field',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5e32ef5838fa4',
                            'operator' => '==',
                            'value' => 'form',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'allow_null' => 0,
                'allow_multiple' => 0,
            ),
            array(
                'key' => 'field_5e32ef3038fa3',
                'label' => 'Privacy Policy',
                'name' => 'privacy_policy',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'taxonomy' => '',
                'allow_null' => 0,
                'allow_archives' => 1,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'ctas',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'the_content',
        ),
        'active' => true,
        'description' => '',
    );

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
