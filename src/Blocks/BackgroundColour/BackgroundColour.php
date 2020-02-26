<?php


namespace Motionlab\Sauce\Blocks\BackgroundColour;

use Motionlab\Sauce\Blocks\Block;

class BackgroundColour extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5dfb879fe9a51',
        'title' => 'Component - Background Colour',
        'fields' => array(
            array(
                'key' => 'field_5dfb8802dd319',
                'label' => 'Background Colour',
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
                    'bg-light-grey' => 'Light Grey',
                    'bg-light-blue' => 'Light Blue',
                    'bg-light-purple' => 'Purple',
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
}