<?php

namespace Motionlab\Sauce;

use Motionlab\Sauce\Blocks\BlockInitialiser;
use Motionlab\Sauce\CPT\CPTProvider;
use Motionlab\Sauce\PageTemplates\TemplateInitialiser;
use Motionlab\Sauce\PageTemplates\PageTemplateProvider;

class Theme
{
    private static $instance;

    /**
     * SELF CLASS INSTANTIATION
     * This allows WordPress to instantiate this class on load.
     */
    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Theme();
        }
        return self::$instance;
    }

    /**
     *
     */
    public function init()
    {
        //Load in ACF from PHP for standard
        new BlockInitialiser();
        new TemplateInitialiser();

        new CPTProvider();
        new MenuLocations();
        $this->registerImageSizes();
        $this->registerShortcodes();
    }

    public function loadTemplates()
    {
        new PageTemplateProvider();
    }

    public function registerImageSizes()
    {
        \add_image_size('icon', 60, 60);
        \add_image_size('location-block-image', 470, 225);
        \add_image_size('banner', 1920, 800);
        \add_image_size('content_width', 700, null, true);
        \add_image_size('post_thumbnail', 450, 300, true);
        \add_image_size('location-block-image', 470, 225);
        \add_image_size('blog-block-image', 750, 500);
        \add_image_size('roundel', 600, 600);
    }

    public function registerShortcodes()
    {
        \add_shortcode('phone-number', [$this, "renderGlobalPhoneNumber"]);
        \add_shortcode('email-address', [$this, "renderGlobalEmailAddress"]);
        \add_shortcode('careers-search', [$this, "renderCareersSearchBox"]);
        \add_shortcode('enquiry-button', [$this, "renderEnquiryButton"]);
        \add_shortcode('practice-name', [$this, "renderPracticeName"]);
        \add_shortcode('previous-practice-name', [$this, "renderPreviousPracticeName"]);
        \add_shortcode('booking-button', [$this, "renderBookAppointmentButton"]);
    }

    public function renderGlobalPhoneNumber()
    {

        /**
         * if on main site && on treatment page
         *      switch blog to main site
         *
         */

        if (defined('LOADED_BLOG_ID')) {
            \restore_current_blog();
        }

        $phoneNumber = \get_field('options_contact_phone', 'option');

        if (defined('LOADED_BLOG_ID')) {
            \switch_to_blog(\get_network()->site_id);
        }
        return "<a class='dark-purple hover-black text-decoration-none' href='tel:$phoneNumber'>$phoneNumber</a>";
    }

    public function renderGlobalEmailAddress()
    {
        if (defined('LOADED_BLOG_ID')) {
            \restore_current_blog();
        }

        $emailAddress = \get_field('options_contact_email', 'option');

        if (defined('LOADED_BLOG_ID')) {
            \switch_to_blog(\get_network()->site_id);
        }
        return "<a href='mailTo:$emailAddress'>$emailAddress</a>";
    }

    public function renderCareersSearchBox($args)
    {
        $fontSize = $args['fontsize'];

        ob_start();
        include(__DIR__ . '/TemplateParts/career-search.php');
        return ob_get_clean();
    }

    public function renderEnquiryButton($args)
    {
        if (defined('LOADED_BLOG_ID')) {
            \restore_current_blog();
        }

        $link = $args['linkto'];
        $text = $args['text'];
        $url = \get_site_url() . $link;

        if (defined('LOADED_BLOG_ID')) {
            \switch_to_blog(\get_network()->site_id);
        }

        return "<a class='btn white uppercase bg-primary h5 rounded text-decoration-none' href='$url'>$text <i class='fa fa-chevron-right white ml2'></i></a>";
    }

    public function renderPracticeName($args)
    {
        return \get_field('options_practice_name', 'option');
    }

    public function renderPreviousPracticeName($args)
    {
        return \get_field('options_previous_practice_name', 'option');
    }

    public function renderBookAppointmentButton($args)
    {
        $bookingLink = \get_field('options_online_booking_url', 'option');

        if (!empty($bookingLink)) {
            return '<a href="'.$bookingLink.'" class="px4 btn btn-primary white bg-primary h3">
                    <span class="h3 mr2"><i class="far fa-calendar-alt" aria-hidden="true"></i></span>
                    Book An Appointment Online
                </a>';
        }
    }
}
