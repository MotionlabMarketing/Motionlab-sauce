<?php


namespace Motionlab\Sauce\Blocks\SpacerBlock;

use Motionlab\Sauce\Blocks\Block;

class SpacerBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5de93cafbb2cf',
        'title' => 'Block - Spacer',
        'fields' => array(
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