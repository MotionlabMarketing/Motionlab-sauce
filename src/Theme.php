<?php

namespace Motionlab\Sauce;

use Motionlab\Sauce\MenuLocations;
use Motionlab\Sauce\CPT\CPTProvider;
use Motionlab\Sauce\Blocks\BlockInitialiser;
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

        $cptProvider = new CPTProvider();
        add_action('init', [$cptProvider, 'bootstrap']);

        // Rank Math - Remove Query String on Redirect.
        add_filter( 'rank_math/redirection/add_query_string', '__return_false' );

        // Add names to theme images sizes.
        add_filter('image_size_names_choose', array($this, 'set_size_names'));

        new MenuLocations();
        $this->registerImageSizes();
        $this->registerShortcodes();
    }

    public function loadTemplates()
    {
        $ptp = new PageTemplateProvider();
        $ptp->bootstrap();
    }

    /**
     * SET IMAGE SIZES
     * Post Utility
     */
    public function registerImageSizes()
    {

        // Add New Image Sizes
        add_image_size('block-blog-4-column', 300, 160, true);
        add_image_size('block-pods-image', 450, 290, true);
        add_image_size('block-team-grid', 310, 200, true);
        add_image_size('block-team-grid-modal', 600, 400, true);
        add_image_size('block-accreditation-static', 120, 80, false);
        
        add_image_size('block-blog-featured-large', 630, 540, true);
        add_image_size('block-blog-featured-standard', 630, 250, true);

        // \add_image_size('icon', 60, 60);
        // \add_image_size('location-block-image', 470, 225);
        // \add_image_size('banner', 1920, 800);
        // \add_image_size('content_width', 700, null, true);
        // \add_image_size('post_thumbnail', 450, 300, true);
        // \add_image_size('location-block-image', 470, 225);
        // \add_image_size('blog-block-image', 750, 500);
        // \add_image_size('roundel', 600, 600);
    }

    public static function set_size_names($sizes)
    {
        return array_merge($sizes, array(
            'block-blog-4-column' => __('Block: Blog - 4 Column'),
            'block-pods-image' => __('Block: PODs Image'),
            'block-team-grid' => __('Block: Team Grid Image'),
            'block-team-grid-modal' => __('Block: Team Grid Modal Image'),
            'block-accreditation-static' => __('Block: Accredication Static Logo'),
        ));
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
