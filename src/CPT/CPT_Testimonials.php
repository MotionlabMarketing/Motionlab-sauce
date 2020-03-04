<?php

namespace Motionlab\Sauce\CPT;

class CPT_Testimonials
{

    // Set CPT options.
    private $name       = "Testimonials"; // Name of the CPT on Registration
    private $group      = "Testimonials";
    private $singular   = "Testimonial";
    private $plural     = "Testimonials";
    private $dashicon   = "dashicons-universal-access";
    private $taxonomies = [];

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

    public function __construct()
    {
        //Register the single template for this post type.
        \add_filter('single_template', [$this, "registerSingleTemplate"]);

        // Register the CPT
        $this->register_CPT();

        // Get taxonomies details
        $this->taxonomies = $this->get_taxonomies_details();

        // Register the taxonomies
        if (!empty($this->taxonomies)) {
            $this->register_taxonomy();
        }
    }

    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == strtolower(str_replace(' ', '', $this->name))) {
            return __DIR__ . "/single-testimonials.php";
        }

        return $single;
    }



    /**
     * REGISTER THE CPT
     * This function setup and registers the custom CPT.
     */
    private function register_CPT()
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

        // Set the CPT options
        $args = array(
            'label'                          => __(strtolower($this->group)),
            'description'                    => __('Manage your ' . $this->plural . '.'),
            'labels'                         => $labels,
            'supports'                       => array('title', 'thumbnail'),
            'public'                         => true,
            'hierarchical'                   => true,
            'show_ui'                        => true,
            'show_in_menu'                   => true,
            'show_in_nav_menus'              => true,
            'show_in_admin_bar'              => true,
            'has_archive'                    => false,
            'can_export'                     => true,
            'exclude_from_search'            => false,
            'yarpp_support'                  => true,
            'taxonomies'                      => array('Verticals','Departments'),
            'publicly_queryable'             => true,
            'capability_type'                => 'page',
            'menu_icon'                      => $this->dashicon,
            'rewrite'                        => array(
                'slug'                       => str_replace(' ', '-', strtolower($this->plural)),
                'with_front'                 => false
            )
        );

        // Register the post type
        \register_post_type($this->name, $args);
    }



    /**
     * REGISTER CUSTOM CPT TAXONOMIES
     * This function sets up and registered the custom taxonomies for the CPT.
     */
    private function register_taxonomy()
    {
        foreach ((object) $this->taxonomies as $tax) {

            // Cast array to an object
            $tax = (object) $tax;

            // Setup the taxonomy labels
            $labels = array(
                'name'                       => __($tax->plural),
                'singular_name'              => __($tax->singular),
                'search_items'               => __('Search ' . $tax->plural),
                'popular_items'              => __('Popular ' . $tax->plural),
                'all_items'                  => __('All ' . $tax->plural),
                'parent_item'                => null,
                'parent_item_colon'          => null,
                'edit_item'                  => __('Edit ' . $tax->singular),
                'update_item'                => __('Update ' . $tax->singular),
                'add_new_item'               => __('Add New ' . $tax->singular),
                'new_item_name'              => __('New ' . $tax->singular),
                'separate_items_with_commas' => __('Separate ' . strtolower($tax->plural) . ' with commas'),
                'add_or_remove_items'        => __('Add or remove ' . strtolower($tax->plural)),
                'choose_from_most_used'      => __('Most used ' . strtolower($tax->plural)),
                'not_found'                  => __('No ' . strtolower($tax->plural) . ' found.'),
                'menu_name'                  => __($tax->plural),
            );

            // Setup the taxonomy options
            $args = array(
                'hierarchical'               => false,
                'labels'                     => $labels,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'update_count_callback'      => '_update_post_term_count',
                'query_var'                  => true,
                'rewrite'                    => array(
                    'slug'                   => str_replace(' ', '-', strtolower($this->group . '/') . strtolower($tax->singular)),
                    'with_front'             => false
                ),
            );

            // Register the taxonomy
            \register_taxonomy(str_replace(' ', '-', strtolower($tax->plural)), strtolower($this->name), $args);

            // Register preset terms
            if (!empty($tax->terms)) {
                foreach ($tax->terms as $term) {

                    // Cast $term array to object
                    $term = (object) $term;

                    \wp_insert_term(
                        $term->name,                                                    // Term name
                        str_replace(' ', '-', strtolower($tax->plural)), // Term taxonomy
                        array(                                                          // Term options
                            'alias_of' => $term->alias_of,
                            'description' => $term->description,
                            'parent' => $term->parent,
                            'slug' => $term->slug
                        )
                    );
                }
            }
        }
    }



    /**
     * GET TAXONOMIES DETAILS
     * This function returns an array of taxonomies for registation.
     */
    public function get_taxonomies_details()
    {

    }

    public static function registerACF() {
        if( function_exists('acf_add_local_field_group') ):
            acf_add_local_field_group(static::$acf);
        endif;
    }

    public static function getAcf() {
        return static::$acf;
    }
}