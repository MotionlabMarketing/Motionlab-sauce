<?php


namespace Motionlab\Sauce\Blocks\FormBlock;

use Motionlab\Sauce\Blocks\Block;

class FormBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5dd5647205d0c',
        'title' => 'Block - Form',
        'fields' => array(
            array(
                'key' => 'field_5dfb9ce93cf10',
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
                'key' => 'field_5dd564783008e',
                'label' => 'Title',
                'name' => 'form_title',
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
                'key' => 'field_5dd564913008f',
                'label' => 'Subtitle',
                'name' => 'form_subtitle',
                'type' => 'textarea',
                'instructions' => 'Enter a message you want to appear between the title and the form itself',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_5dd68555eaf4b',
                'label' => 'Form',
                'name' => 'form_form',
                'type' => 'ninja_forms_field',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'allow_null' => 0,
                'allow_multiple' => 0,
            ),
            array(
                'key' => 'field_5dd6856ceaf4c',
                'label' => 'Footer Message',
                'name' => 'form_footer_message',
                'type' => 'wysiwyg',
                'instructions' => 'The content here will show below the submit button of the selected form.',
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