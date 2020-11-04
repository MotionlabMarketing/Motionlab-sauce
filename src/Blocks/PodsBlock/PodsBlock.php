<?php


namespace Motionlab\Sauce\Blocks\PodsBlock;

use Motionlab\Sauce\Blocks\Block;

class PodsBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5e32b00e4ba77',
        'title' => 'Block - Pods',
        'fields' => array(
            array(
                'key' => 'field_a6f7f4acfe082',
                'label' => 'Display Section Background Image',
                'name' => 'pods_section_background_enabled',
                'type' => 'true_false',
                'instructions' => 'Turn on/off visible borders on each key feature.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_cbd90cd80d59132f3',
                'label' => 'Section Background Image',
                'name' => 'pod_section_background_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_a6f7f4acfe082',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                ),
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
            array(
                'key' => 'field_5e32b01e3ab59',
                'label' => 'Section Layout',
                'name' => 'pods_layout',
                'type' => 'select',
                'instructions' => 'This controls the way the pods are rendered out in their list.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'standard' => 'Standard (6 pods)',
                    'central' => 'Central Feature (4 pods)',
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
                'key' => 'field_2d19add19f084',
                'label' => 'Layout',
                'name' => 'pods_content_layout',
                'type' => 'select',
                'instructions' => 'This controls the way in which the content for each individual pod is rendered.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'standard' => 'Content on Hover',
                    'top' => 'Content on Top',
                    'bottom' => 'Content on Bottom',
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
                'key' => 'field_5e32b0ce3ab5a',
                'label' => 'Pods',
                'name' => 'pods_pods',
                'type' => 'repeater',
                'instructions' => 'Whilst you are able to add an unlimited number of pods, the front-end display of the pods will be limited based on the layout you have chosen. For example, choosing the Central Feature layout will only use the first 5 pods that you add.',
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
                'layout' => 'table',
                'button_label' => 'Add Pod',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5e32b2a43ab5b',
                        'label' => 'Background Image',
                        'name' => 'pod_background_image',
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
                    array(
                        'key' => 'field_5e32b2d83ab5c',
                        'label' => 'Title',
                        'name' => 'pod_title',
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
                        'key' => 'field_5e32b2e33ab5d',
                        'label' => 'Content',
                        'name' => 'pod_content',
                        'type' => 'wysiwyg',
                        'instructions' => 'Enter a brief description of what this pod will link to.',
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
                        'key' => 'field_5e32b3833ab5e',
                        'label' => 'Link To',
                        'name' => 'pod_link',
                        'type' => 'link',
                        'instructions' => 'Where should the user be sent when clicking this pod?',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
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
        switch($this->blockConfiguration['pods_layout']) {
            case 'central':
                $this->layout = 'central';
                include(__DIR__ . '/central.php');
                break;
            default:
                include(__DIR__ . '/block.php');
                break;
        }
    }
}
