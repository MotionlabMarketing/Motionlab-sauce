<?php


namespace Motionlab\Sauce\Blocks\PackagesBlock;

use Motionlab\Sauce\Blocks\Block;

class PackagesBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_3a57fa2d28e85',
        'title' => 'Block - Packages',
        'fields' => array(
            array(
                'key' => 'field_5f7dbaa8c7f3a',
                'label' => 'Layout',
                'name' => 'packages_layout',
                'type' => 'select',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'three' => 'Three Packages',
                    'full' => 'Full Page',
                ),
                'default_value' => 'full',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5f7dbb53c7f3b',
                'label' => 'Package One',
                'name' => 'packages_package_1',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f7dbaa8c7f3a',
                            'operator' => '==',
                            'value' => 'three',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '33.33',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
            array(
                'key' => 'field_5f7dbbdf288d1',
                'label' => 'Package Two',
                'name' => 'packages_package_2',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f7dbaa8c7f3a',
                            'operator' => '==',
                            'value' => 'three',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '33.33',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
            array(
                'key' => 'field_5f7dbbe6288d2',
                'label' => 'Package Three',
                'name' => 'packages_package_3',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f7dbaa8c7f3a',
                            'operator' => '==',
                            'value' => 'three',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '33.33',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
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
        'active' => false,
        'description' => '',
    );

    public function init() {
        if($this->blockConfiguration['packages_layout'] == 'full') {
            $this->layout = 'three';
            include(__DIR__ . '/block_full.php');
        }else{
            $this->layout = 'full';
            include(__DIR__ . '/block_three.php');
        }
    }

    private function getPackages()
    {
        $packages = new \WP_Query(array(
            'post_type' => 'packages',
            'post_status' => 'publish',
        ));

        $packages = $packages->posts;

        $packagesToPrint = [];

        foreach($packages as $package) {
            $_package = array();

            $_package['title'] = $package->post_title;
            $_package['subtitle'] = \get_field('subtitle', $package->ID);
            $_package['background_colour'] = \get_field('background_colour', $package->ID);
            $_package['features_header'] = \get_field('features_header', $package->ID);
            $_package['features'] = \get_field('features', $package->ID);
            $_package['price'] = \get_field('price', $package->ID);
            $_package['link_title'] = \get_field('link_title', $package->ID);
            $_package['link_location'] = \get_field('link_location', $package->ID);

            $packagesToPrint[] = $_package;
        }

        return $packagesToPrint;

    }

    public static function unleash($layout = 'default')
    {
        $instance = new PackagesBlock([
            'packages_layout' => $layout
        ],false);
        $instance->init();
        return $instance;
    }

}
