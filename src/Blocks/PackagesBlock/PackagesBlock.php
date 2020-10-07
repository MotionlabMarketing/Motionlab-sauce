<?php


namespace Motionlab\Sauce\Blocks\PackagesBlock;

use Motionlab\Sauce\Blocks\Block;

class PackagesBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5dd6c54248573',
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
                    'full: Full Page' => 'full: Full Page',
                ),
                'default_value' => 'three',
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
        if($this->blockConfiguration['packages_full_size'] == 'mini') {
            $this->layout = 'mini_block';
            include(__DIR__ . '/mini_block.php');
        }else{
            include(__DIR__ . '/block.php');
        }
    }

    private function getPackages() {

        if($this->blockConfiguration['packages_posts_to_display'] != "latest") {
            //Fetch ACF field and loop over posts
            $packages = $this->blockConfiguration['packages_selected'];
        } else {
            //Make wp query for the latest posts
            $packages = new \WP_Query(array(
                'post_type' => 'packages',
                'post_status' => 'publish',
            ));

            $packages = $packages->posts;
        }

        $packagesToPrint = [];

        foreach($packages as $package) {
            $_package = array();

            $_package['title'] = $package->post_title;
            $_package['content'] = \get_field('package_content', $package->ID);
            $_package['reviewer'] = \get_field('package_reviewer_name', $package->ID);
            $_package['date'] = \get_field('package_date', $package->ID);
            $_package['star_rating'] = \get_field('package_star_rating', $package->ID);

            $packagesToPrint[] = $_package;
        }

        return $packagesToPrint;

    }

    public static function unleash($layout = 'default')
    {
        $instance = new PackagesBlock([
            'packages_posts_to_display' => 'latest',
            'packages_full_size' => $layout
        ],false);
        $instance->init();
        return $instance;
    }

}
