<?php


namespace Motionlab\Sauce\Blocks\LocationFinderBlock;

use Motionlab\Sauce\Blocks\Block;

class LocationFinderBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5dd6839f22acf',
        'title' => 'Block - Location Finder',
        'fields' => array(
            array(
                'key' => 'field_5dd683aeca46a',
                'label' => 'Content',
                'name' => 'location_finder_content',
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
                'key' => 'field_5dfb4507cc4aa',
                'label' => 'Background Colour',
                'name' => 'location_finder_background_colour',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '#e4e7ea',
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
        $this->registerImageSizes();
    }

    private function registerImageSizes() {
        \add_image_size( 'location-block-image', 220, 180 );
    }
}