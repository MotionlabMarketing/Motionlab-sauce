<?php


namespace Motionlab\Sauce\Blocks\TestimonialsBlock;

use Motionlab\Sauce\Blocks\Block;

class TestimonialsBlock extends Block
{
    public function init() {
        if($this->blockConfiguration['testimonials_full_size'] == 'mini') {
            $this->layout = 'mini_block';
            include(__DIR__ . '/mini_block.php');
        }else{
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
            'testimonials_full_size' => $layout
        ],false);
        $instance->init();
        return $instance;
    }

}
