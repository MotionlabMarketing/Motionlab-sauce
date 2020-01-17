<?php

namespace Motionlab\TogetherDentalGroup\PageTemplates\Testimonials;

use Motionlab\TogetherDentalGroup\PageTemplates\TemplateBase;

class TestimonialsTemplate extends TemplateBase
{

    public function init() {
        //Use this to collect any other information about the template.
        \add_filter('page_template', [$this, "generate"]);
        \add_filter('theme_page_templates', [$this, "load"], 10, 4);
    }

    public function load($post_templates, $wp_theme, $post, $post_type) {
        $post_templates['testimonials-template.php'] = __('Testimonials');

        return $post_templates;
    }

    public function generate( $page_template ) {
        if(get_page_template_slug() == "testimonials-template.php") {
            $page_template = __DIR__ . "/template.php";
        }

        return $page_template;
    }

    public function getTestimonials() {

        //Make wp query for the latest posts
        $testimonials = new \WP_Query(array(
            'post_type' => 'testimonials',
            'post_status' => 'publish',
        ));

        $testimonials = $testimonials->posts;

        $testimonialsToPrint = [];

        foreach($testimonials as $testimonial) {
            $_testimonial = array();

            $_testimonial['title'] = $testimonial->post_title;
            $_testimonial['content'] = \get_field('testimonial_content', $testimonial->ID);
            $_testimonial['reviewer'] = \get_field('testimonial_reviewer_name', $testimonial->ID);
            $_testimonial['date'] = \get_field('testimonial_date', $testimonial->ID);
            $_testimonial['star_rating'] = \get_field('testimonial_star_rating', $testimonial->ID);
            $_testimonial['related_treatment'] = \get_field('testimonial_treatment', $testimonial->ID);

            $testimonialsToPrint[] = $_testimonial;
        }

        return $testimonialsToPrint;

    }
}
