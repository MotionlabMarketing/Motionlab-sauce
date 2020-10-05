<?php


namespace Motionlab\Sauce\Blocks\TestimonialsBlock;

use Motionlab\Sauce\Blocks\Block;

class TestimonialsBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5dd6c54248573',
        'title' => 'Block - Testimonials',
        'fields' => array(
            array(
                'key' => 'field_522d69bbae2d2',
                'label' => 'Layout',
                'name' => 'testimonials_layout',
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
                    'default' => 'Default',
                    'threes' => 'Groups of Three',
                    'mini_block' => 'Mini',
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
                'key' => 'field_5dd6c54257bba',
                'label' => 'Content',
                'name' => 'testimonials_content',
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
                'key' => 'field_5ddd69bbae2d2',
                'label' => 'Post to Display',
                'name' => 'testimonials_posts_to_display',
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
                    'latest' => 'Latest Posts',
                    'selected' => 'Select Manually',
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
                'key' => 'field_5dd6c54257b7e',
                'label' => 'Selected',
                'name' => 'testimonials_selected',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5ddd69bbae2d2',
                            'operator' => '==',
                            'value' => 'selected',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'testimonials',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                    1 => 'taxonomy',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
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
        if($this->blockConfiguration['testimonials_layout'] == 'mini') {
            $this->layout = 'mini_block';
            include(__DIR__ . '/mini_block.php');
        } elseif ($this->blockConfiguration['testimonials_layout'] == 'threes') {
            $this->layout = 'threes';
            include(__DIR__ . '/threes.php');
        } else{
            include(__DIR__ . '/block.php');
        }
    }

    private function getTestimonials() {

        if($this->blockConfiguration['testimonials_posts_to_display'] != "latest") {
            //Fetch ACF field and loop over posts
            $testimonials = $this->blockConfiguration['testimonials_selected'];
        } else {
            //Make wp query for the latest posts
            $testimonials = new \WP_Query(array(
                'post_type' => 'testimonials',
                'post_status' => 'publish',
            ));

            $testimonials = $testimonials->posts;
        }

        $testimonialsToPrint = [];

        foreach($testimonials as $testimonial) {
            $_testimonial = array();

            $_testimonial['title'] = $testimonial->post_title;
            $_testimonial['content'] = \get_field('testimonial_content', $testimonial->ID);
            $_testimonial['reviewer'] = \get_field('testimonial_reviewer_name', $testimonial->ID);
            $_testimonial['date'] = \get_field('testimonial_date', $testimonial->ID);
            $_testimonial['star_rating'] = \get_field('testimonial_star_rating', $testimonial->ID);

            $testimonialsToPrint[] = $_testimonial;
        }

        return $testimonialsToPrint;

    }

    public static function unleash($layout = 'default')
    {
        $instance = new TestimonialsBlock([
            'testimonials_posts_to_display' => 'latest',
            'testimonials_layout' => $layout
        ],false);
        $instance->init();
        return $instance;
    }

}
