<?php

namespace Motionlab\Sauce\Blocks\BreadcrumbsBlock;

use Motionlab\Sauce\Blocks\Block;
use Motionlab\Sauce\Components\Breadcrumbs;

class BreadcrumbsBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_bfb475e1524a5',
        'title' => 'Block - Breadcrumbs',
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

    public function init()
    {
        $crumbs = new Breadcrumbs();
        $crumbs->render();
    }

    // added for consistency
    public static function unleash()
    {
        $crumbs = new Breadcrumbs();
        $crumbs->render();
    }

}