<?php

namespace Motionlab\TogetherDentalGroup\PageTemplates\Jobs;

use Motionlab\TogetherDentalGroup\PageTemplates\TemplateBase;

class JobsTemplate extends TemplateBase
{

    public function init() {
        //Use this to collect any other information about the template.
        \add_filter('page_template', [$this, "generate"]);
        \add_filter('theme_page_templates', [$this, "load"], 10, 4);
    }

    public function load($post_templates, $wp_theme, $post, $post_type) {
        $post_templates['jobs-template.php'] = __('Jobs');

        return $post_templates;
    }

    public function generate( $page_template ) {
        if(get_page_template_slug() == "jobs-template.php") {
            $page_template = __DIR__ . "/template.php";
        }

        return $page_template;
    }
}
