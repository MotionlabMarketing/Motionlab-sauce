<?php

namespace Motionlab\Sauce;

use Motionlab\Sauce\Blocks\BlockInitialiser;
use Motionlab\Sauce\CPT\CPTProvider;
use Motionlab\Sauce\PageTemplates\TemplateInitialiser;
use Motionlab\Sauce\PageTemplates\PageTemplateProvider;
use Motionlab\Sauce\MenuLocations;

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

        $cptProvider = new CPTProvider();
        add_action('init', [$cptProvider, 'bootstrap']);

        // Rank Math - Remove Query String on Redirect.
        add_filter( 'rank_math/redirection/add_query_string', '__return_false' );

        new MenuLocations();
        $this->registerImageSizes();
        $this->registerShortcodes();
    }

    public function loadTemplates()
    {
        $ptp = new PageTemplateProvider();
        $ptp->bootstrap();
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
        \add_shortcode('organisation-name', [$this, "renderOrganisationName"]);
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

    public function renderOrganisationName($args)
    {
        return \get_field('options_organisation_name', 'option');
    }
}
