<?php

namespace Motionlab\Sauce\PageTemplates\Treatments;

use Motionlab\Sauce\PageTemplates\TemplateBase;

class TreatmentsTemplate extends TemplateBase
{
    public function load($post_templates, $wp_theme, $post, $post_type) {
        $post_templates['treatments-template.php'] = __('Treatments');

        return $post_templates;
    }

    public function generate( $page_template ) {
        if(get_page_template_slug() == "treatments-template.php") {
            $page_template = __DIR__ . "/template.php";
        }

        return $page_template;
    }
}