<?php

namespace Motionlab\Sauce\CPT;

class CPT_Locations
{

    // Set CPT options.
    private $name       = "Locations"; // Name of the CPT on Registration
    private $group      = "Locations";
    private $singular   = "Location";
    private $plural     = "Locations";
    private $dashicon   = "dashicons-location-alt";
    private $taxonomies = [];

    public static $acf = array(
        'key' => 'group_5de1382249349',
        'title' => 'CPT - Locations',
        'fields' => array(
            array(
                'key' => 'field_5de138a121682',
                'label' => 'Practice Type',
                'name' => 'location_practice_type',
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
                    'nhs' => 'NHS Dentistry',
                    'cosmetic' => 'Cosmetic Only',
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
                'key' => 'field_5de1390b21683',
                'label' => 'Treatments',
                'name' => 'location_treatments',
                'type' => 'relationship',
                'instructions' => 'Which treatments does this location provide? This will be used when searching locations.',
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
                'filters' => array(
                    0 => 'search',
                    1 => 'taxonomy',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
            array(
                'key' => 'field_5de13b2521684',
                'label' => 'Accessibility',
                'name' => 'location_accessibility',
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
                'key' => 'field_5de13b9521685',
                'label' => 'Phone Number',
                'name' => 'location_phone_number',
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
                'key' => 'field_5de13bc921686',
                'label' => 'Email Address',
                'name' => 'location_email_address',
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
                'key' => 'field_5de557825544f',
                'label' => 'Website URL',
                'name' => 'location_website_url',
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
                'key' => 'field_5de13c6921687',
                'label' => 'Address',
                'name' => 'location_address',
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
                'key' => 'field_5de13cd821688',
                'label' => 'Postcode',
                'name' => 'location_postcode',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
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
                'key' => 'field_5de14cad22811',
                'label' => 'Latitude',
                'name' => 'location_latitude',
                'type' => 'text',
                'instructions' => 'This field will automatically be populated upon saving the post',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
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
                'key' => 'field_5de14cd622812',
                'label' => 'Longitude',
                'name' => 'location_longitude',
                'type' => 'text',
                'instructions' => 'This field will automatically be populated upon saving the post',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
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
                'key' => 'field_5de91dee6c2e6',
                'label' => 'Opening Times',
                'name' => 'location_opening_times',
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
                'max' => 7,
                'layout' => 'row',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5de91dfe6c2e7',
                        'label' => 'Day',
                        'name' => 'opening_hours_day',
                        'type' => 'text',
                        'instructions' => 'This can be a single (e.g Mon/Monday) or a group of days (e.g Mon-Fri) if multiple days have the same opening times.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
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
                        'key' => 'field_5de91e176c2e8',
                        'label' => 'Time',
                        'name' => 'opening_hours_time',
                        'type' => 'text',
                        'instructions' => 'Opening hours of the practice on the entered day',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_5de13d3921689',
                'label' => 'Content',
                'name' => 'location_content',
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
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'locations',
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
        $base_url = getenv('POSTCODES_URL');
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

    public static function registerACF() {
        if( function_exists('acf_add_local_field_group') ):
            acf_add_local_field_group(static::$acf);
        endif;
    }

    public static function getAcf() {
        return static::$acf;
    }
}