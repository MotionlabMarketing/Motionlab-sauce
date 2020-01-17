<?php

namespace Motionlab\Sauce\CPT;

class CPT_Treatments
{

    // Set CPT options.
    private $name       = "Treatments"; // Name of the CPT on Registration
    private $group      = "Treatments";
    private $singular   = "Treatment";
    private $plural     = "Treatments";
    private $dashicon   = "dashicons-code-standards";
    private $taxonomies = [];

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
            return __DIR__ . "/single-treatments.php";
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
            'taxonomies'                      => array('Tags', 'Treatment Sectors'),
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
        return array(
            array(
                'plural' => "Tags",
                'singular' => "Tag",
                'terms' => array(
                    array(
                        'name' => "Featured",
                        'alias_of' => '',
                        'description' => '',
                        'parent' => '',
                        'slug' => 'featured'
                    ),
                    array(
                        'name' => "New",
                        'alias_of' => '',
                        'description' => '',
                        'parent' => '',
                        'slug' => 'new'
                    )
                )
            ),
            array(
                'plural' => "Treatment Sectors",
                'singular' => "Treatment Sector",
                'terms' => array(
                    array(
                        'name' => "Cosmetic Dentistry",
                        'alias_of' => '',
                        'description' => '',
                        'parent' => '',
                        'slug' => 'cosmetic-dentistry'
                    ),
                    array(
                        'name' => "Teeth Straightening",
                        'alias_of' => '',
                        'description' => '',
                        'parent' => '',
                        'slug' => 'teeth-straightening'
                    ),
                    array(
                        'name' => "General Dental Care",
                        'alias_of' => '',
                        'description' => '',
                        'parent' => '',
                        'slug' => 'general-dental-care'
                    ),
                    array(
                        'name' => "Missing Teeth",
                        'alias_of' => '',
                        'description' => '',
                        'parent' => '',
                        'slug' => 'missing-teeth'
                    ),
                    array(
                        'name' => "Other Treatments",
                        'alias_of' => '',
                        'description' => '',
                        'parent' => '',
                        'slug' => 'other-treatments'
                    )
                )
            )
        );
    }
}