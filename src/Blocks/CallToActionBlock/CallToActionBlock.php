<?php

namespace Motionlab\Sauce\Blocks\CallToActionBlock;

use Motionlab\Sauce\Blocks\Block;

class CallToActionBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5e32f55d2ec84',
        'title' => 'Block - CTA',
        'fields' => array(
            array(
                'key' => 'field_5e32f56475d6a',
                'label' => 'Call To Action',
                'name' => 'call_to_action',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'ctas',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
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
        'active' => true,
        'description' => '',
    );

    private $callToAction;

    public function __construct($blockConfiguration, $initialize = true)
    {
        parent::__construct($blockConfiguration, false);
        if($blockConfiguration !== null){
            $this->setCallToAction($this->blockConfiguration['call_to_action']);
        }
        if($initialize){
            $this->init();
        }
    }

    public function init()
    {
        include(__DIR__ . '/block.php');
    }

    public function setCallToAction(int $post_id)
    {
        $this->callToAction = get_fields($post_id);
    }

    public static function unleash(int $post_id)
    {
        $instance = new CallToActionBlock(null,false);
        $instance->setCallToAction($post_id);
        $instance->init();
        return $instance;
    }

}
