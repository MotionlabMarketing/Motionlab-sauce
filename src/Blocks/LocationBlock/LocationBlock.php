<?php


namespace Motionlab\Sauce\Blocks\LocationBlock;

use Motionlab\Sauce\Blocks\Block;

class LocationBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5ddd624248e63',
        'title' => 'Block - Location',
        'fields' => array(
            array(
                'key' => 'field_5dfb9e06a10e7',
                'label' => 'Background Colour',
                'name' => 'background_colour',
                'type' => 'clone',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'clone' => array(
                    0 => 'group_5dfb879fe9a51',
                ),
                'display' => 'seamless',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ),
            array(
                'key' => 'field_5de91f1a730ba',
                'label' => 'Selected Location',
                'name' => 'location_selected_location',
                'type' => 'post_object',
                'instructions' => 'Leave this field empty to print the current site\'s details (Data fetched from Site Options).',
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
            array(
                'key' => 'field_5ddd62b09a8cc',
                'label' => 'Featured Image',
                'name' => 'location_image',
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
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => false,
        'description' => '',
    );

    public function init() {
        include(__DIR__ . '/block.php');
    }

    private function getLocationDetails($locationID) {

        $location = [];

        if($locationID) {
            $location['name'] = \get_the_title($locationID);
            $location['address'] = \get_field('location_address', $locationID);
            $location['postcode'] = \get_field('location_postcode', $locationID);
            $location['opening_times'] = \get_field('location_opening_times', $locationID);
            $location['email'] = \get_field('location_email_address', $locationID);
            $location['phone'] = \get_field('location_phone_number', $locationID);
        } else {
            $location['name'] = \get_field('options_organisation_name', 'option');
            $location['address'] = \get_field('options_organisation_address', 'option');
            $location['postcode'] = \get_field('options_organisation_postcode', 'option');
            $location['opening_times'] = \get_field('option_opening_hours', 'option');
            $location['email'] = \get_field('options_contact_email', 'option');
            $location['phone'] = \get_field('options_contact_phone', 'option');
        }

        return $location;
    }
}