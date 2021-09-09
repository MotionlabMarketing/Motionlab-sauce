<?php

namespace Motionlab\Sauce\CPT;

use Motionlab\Sauce\CPT\CPTBase;

class CPT_CallToActions extends CPTBase
{

    // Set CPT options.
    protected $name       = "CTAs"; // Name of the CPT on Registration
    protected $group      = "CTAs";
    protected $singular   = "CTA";
    protected $plural     = "CTAs";
    protected $dashicon   = "dashicons-warning";
    protected $taxonomies = [];

    /**
     * REGISTER THE CPT
     * This function setup and registers the custom CPT.
     */
    protected function register_CPT()
    {
        // Set the menu labels
        $labels = array(
            'name'                           => __($this->plural),
            'singular_name'                  => __($this->singular),
            'menu_name'                      => __($this->plural),
            'parent_item_colon'              => __('Parent ' . $this->group),
            'all_items'                      => __('All ' . $this->plural),
            'view_item'                      => __('View ' . $this->singular),
            'add_new_item'                   => __('Add New ' . $this->singular),
            'add_new'                        => __('Add New ' . $this->singular),
            'edit_item'                      => __('Edit ' . $this->singular),
            'update_item'                    => __('Update ' . $this->singular),
            'search_items'                   => __('Search ' . $this->plural),
            'not_found'                      => __('Not Found'),
            'not_found_in_trash'             => __('Not found in Bin')
        );

        $taxNames = [];
        if(!empty($this->taxonomies)) {
            foreach($this->taxonomies as $tax) {
                $taxNames[] = str_replace(' ', '-', strtolower($tax['plural']));
            }
        }

        // Set the CPT options
        $args = array(
            'label'                          => __(strtolower($this->group)),
            'description'                    => __('Manage your ' . $this->plural . '.'),
            'labels'                         => $labels,
            'supports'                       => array('title', 'thumbnail'),
            'public'                         => true,
            'hierarchical'                   => false,
            'show_ui'                        => true,
            'show_in_menu'                   => true,
            'show_in_nav_menus'              => true,
            'show_in_admin_bar'              => true,
            'has_archive'                    => true,
            'can_export'                     => true,
            'exclude_from_search'            => true,
            'yarpp_support'                  => true,
            'taxonomies'                     => $taxNames,
            'publicly_queryable'             => true,
            'capability_type'                => 'page',
            'menu_icon'                      => $this->dashicon,
            'rewrite'                        => array(
                'slug'                       => str_replace(' ', '-', strtolower($this->plural)),
                'with_front'                 => false
            )
        );

        // Register the post type
        \register_post_type(strtolower($this->name), $args);
    }

    public static $acf = array(
        'key' => 'group_5e32ee74688bc',
        'title' => 'CPT - CTA',
        'fields' => array(
            array(
                'key' => 'field_5dfb8802dd319',
                'label' => 'Background Colours',
                'name' => 'background_colour',
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
                    'bg-white' => 'White',
                    'bg-smoke' => 'Smoke',
                    'bg-grey' => 'Gray',
                    'bg-black' => 'Black',
                    'bg-charcoal' => 'Charcoal',
                    'bg-light-grey' => 'Light Grey',
                    'bg-light-blue' => 'Light Blue',
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
                'key' => 'field_5eb5274404e7c',
                'label' => 'Background Image',
                'name' => 'background_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_afd502a199a80',
                'label' => 'Background Image Position Desktop',
                'name' => 'background_image_position',
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
                    'bg-center-right' => 'Center Right',
                    'bg-center' => 'Center Center',
                    'bg-center-left' => 'Center Left',
                ),
                'default_value' => array(
                    0 => 'bg-center',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_8e56d1c9514f7',
                'label' => 'Overlay Colour',
                'name' => 'overlay_colour',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
            ),
            array(
                'key' => 'field_ef44d1e0b9fc5',
                'label' => 'Overlay Opacity',
                'name' => 'overlay_opacity',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'opacity-1' => '1',
                    'opacity-2' => '2',
                    'opacity-3' => '3',
                    'opacity-4' => '4',
                    'opacity-5' => '5',
                    'opacity-6' => '6',
                ),
                'default_value' => array(
                ),
                'allow_null' => 1,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_c50e9489deb9b',
                'label' => 'Bordered Content',
                'name' => 'cta_bordered_content',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33%',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Border',
                'ui_off_text' => 'No Border',
            ),
            array(
                'key' => 'field_53e8eb12f44aa',
                'label' => 'Slimline',
                'name' => 'cta_slimline',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33%',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Slim',
                'ui_off_text' => 'Full Height',
            ),
            array(
                'key' => 'field_f7265c186d62a',
                'label' => 'Boxed Content',
                'name' => 'cta_boxed_content',
                'type' => 'true_false',
                'instructions' => 'Have the CTA render as a shadowed box that breaks the content flow.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33%',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Boxed',
                'ui_off_text' => 'Standard',
            ),
            array(
                'key' => 'field_5fac6100199d3',
                'label' => 'Content',
                'name' => 'cta_content',
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
                'key' => 'field_52ba95c286a43',
                'label' => 'Image',
                'name' => 'cta_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_188da92efede1',
                'label' => 'Button Alignment',
                'name' => 'cta_button_alignment',
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
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right',
                ),
                'default_value' => array(),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_d6e348962e63b',
                'label' => 'Buttons',
                'name' => 'cta_buttons',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5defaec872ab3',
                        'label' => 'Button',
                        'name' => 'button',
                        'type' => 'link',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_5df0cd34b5d56',
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'font-awesome',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'icon_sets' => array(
                            0 => 'far',
                        ),
                        'custom_icon_set' => '',
                        'default_label' => '',
                        'default_value' => '',
                        'save_format' => 'element',
                        'allow_null' => 0,
                        'show_preview' => 1,
                        'enqueue_fa' => 0,
                        'fa_live_preview' => '',
                        'choices' => array(),
                    ),
                    array(
                        'key' => 'field_f078f1bc2dc99',
                        'label' => 'Button Type',
                        'name' => 'button_type',
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
                            'default' => 'Default',
                            'keyline_black' => 'Keyline (Primary)',
                            'keyline_white' => 'Keyline (Secondary)',
                        ),
                        'default_value' => array(),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'return_format' => 'value',
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                ),
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
