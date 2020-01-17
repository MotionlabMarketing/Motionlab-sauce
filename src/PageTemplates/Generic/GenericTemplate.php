<?php

namespace Motionlab\Sauce\PageTemplates\Generic;

use Motionlab\Sauce\PageTemplates\TemplateBase;

class GenericTemplate extends TemplateBase
{
    public function load($post_templates, $wp_theme, $post, $post_type) {
        $post_templates['generic-template.php'] = __('Generic');

        return $post_templates;
    }

    public function generate( $page_template ) {
        if(get_page_template_slug() == "generic-template.php") {
            $page_template = __DIR__ . "/template.php";
        }

        return $page_template;
    }
}