<?php

namespace Motionlab\Sauce\CPT;

class CPT_Locations extends CPTBase
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
     * GET TAXONOMIES DETAILS
     * This function returns an array of taxonomies for registation.
     */
    public function get_taxonomies_details()
    {

    }
}