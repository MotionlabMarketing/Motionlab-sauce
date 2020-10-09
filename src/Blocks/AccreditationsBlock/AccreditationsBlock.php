<?php


namespace Motionlab\Sauce\Blocks\AccreditationsBlock;

use Motionlab\Sauce\Blocks\Block;

class AccreditationsBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5dfa4726a0d16',
        'title' => 'Block - Accreditations',
        'fields' => array(
            array(
                'key' => 'field_5dfb89cc0e233',
                'label' => 'Background Colour',
                'name' => 'accreditations_background_colour',
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
                'key' => 'field_63151a00307d8',
                'label' => 'Height',
                'name' => 'accreditation_layout',
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
                    'carousel' => 'Carousel',
                    'static' => 'Static',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_3900161560699',
                'label' => 'Content',
                'name' => 'accreditation_content',
                'type' => 'wysiwyg',
                'instructions' => 'Displayed to the left of accreditation logos',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_63151a00307d8',
                            'operator' => '==',
                            'value' => 'static',
                        ),
                    ),
                ),
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
                'key' => 'field_5dfa473a48625',
                'label' => 'Accreditations',
                'name' => 'accreditations_accreditations',
                'type' => 'repeater',
                'instructions' => 'The static layout will only show the first 5 accreditations added.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'row',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5dfa475648626',
                        'label' => 'Image',
                        'name' => 'accreditation_image',
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
        switch($this->blockConfiguration['']) {
            case 'carousel':
                include(__DIR__ . '/block.php');
                break;
            case 'static':
                include(__DIR__ . '/static.php');
                break;
            default:
                include(__DIR__ . '/block.php');
        }
        include(__DIR__ . '/block.php');
    }
}