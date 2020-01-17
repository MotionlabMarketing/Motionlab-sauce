<?php

namespace Motionlab\TogetherDentalGroup\CPT;

class CPT_Locations
{

    // Set CPT options.
    private $name       = "Locations"; // Name of the CPT on Registration
    private $group      = "Locations";
    private $singular   = "Location";
    private $plural     = "Locations";
    private $dashicon   = "dashicons-location-alt";
    private $taxonomies = [];



    public function __construct()
    {
        //Register the single template for this post type.
        \add_filter('single_template', [$this, "registerSingleTemplate"]);

        // Register the CPT
        $this->register_CPT();

        // Get taxonomies details
        $this->taxonomies = $this->get_taxonomies_details();

        // Register any hooks for this CPT
        $this->registerHooks();

        // Register the taxonomies
        if (!empty($this->taxonomies)) {
            $this->register_taxonomy();
        }
    }

    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == strtolower(str_replace(' ', '', $this->name))) {
            return __DIR__ . "/single-locations.php";
        }

        return $single;
    }

    private function registerHooks() {
        \add_action('save_post', [$this, 'updateLatLng']);
    }

    public function updateLatLng($post_id){
        global $post;

        if (is_object($post) && $post->post_type != strtolower($this->name)){
            return;
        }

        $lat = null; $lng = null;

        //Grab the postcode and remove spaces. Save back without spaces.
        $saved_postcode = str_replace(' ', '', \get_field('location_postcode', $post_id));
        \update_field('location_postcode', $saved_postcode, $post_id);

        if($saved_postcode != "") {

            $postcode_response = json_decode($this->fetchPostcodeInformation($saved_postcode));

            if($postcode_response->status == 200) {
                \update_field("location_latitude", $postcode_response->result->latitude, $post_id);
                \update_field("location_longitude", $postcode_response->result->longitude, $post_id);
            }
        }

        return;
    }

    private function fetchPostcodeInformation ($postcode) {
        $base_url = POSTCODES_URL;
        $full_url = $base_url . urlencode($postcode);

        $ch = curl_init($full_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
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
                'slug'                       => "_" . str_replace(' ', '-', strtolower($this->plural)),
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
}