<?php

namespace Motionlab\Sauce\Components;

class Breadcrumbs
{

    public function __construct()
    {
        // lets try not to need too much here
    }

    public function render($template = null)
    {
        if($template === null){
            $childTemplate = get_stylesheet_directory().'/src/template_parts/breadcrumbs.php';
            $sauceTemplate = get_template_directory().'/TemplateParts/breadcrumbs.php';
            if(file_exists($childTemplate)){
                $template = $childTemplate;
            } elseif(file_exists($sauceTemplate)) {
                $template = $sauceTemplate;
            } else {
                throw new \Exception('No breadcrumbs template was found.');
            }
        }

        $crumbs = $this->getCrumbs();
        include $template;
    }

    public function getCrumbs() : array
    {
        global $post;
        $crumbs = [['label' => 'Home', 'href' => '/', 'class' => 'mlsbc-home']];

        if (is_single()) {
            $trail = $this->getPostCrumbs($post);
        } elseif(is_archive()) {
            $trail = $this->getArchiveCrumbs();
        } else {
            $trail = $this->getPageCrumbs($post);
        }

        $crumbs = array_merge($crumbs, $trail);
        return $crumbs;
    }

    private function getPostCrumbs($finalPost) : array
    {
        $trail = [];

        array_push($trail, [
            'label' => $finalPost->post_title,
            'href' => get_permalink($finalPost->ID),
            'class' => 'mlsbc-single'
        ]);

        if($primaryCategory = get_post_meta($finalPost->ID, 'rank_math_primary_category', true )){
            $term = get_term($primaryCategory);
            array_push($trail, [
                'label' => $term->name,
                'href' => get_category_link($term->term_id),
                'class' => 'mlsbc-category'
            ]);
        }

        $postType = get_post_type_object($finalPost->post_type);
        array_push($trail, [
            'label' => $postType->labels->name,
            'href' => get_post_type_archive_link($finalPost->post_type),
            'class' => 'mlsbc-post-type'
        ]);

        return array_reverse($trail);
    }

    private function getPageCrumbs($finalPost) : array
    {
        $trail = [];

        array_push($trail, [
            'label' => $finalPost->post_title,
            'href' => get_permalink($finalPost->ID),
            'class' => 'mlsbc-page'
        ]);

        foreach((array)get_post_ancestors($finalPost->ID) as $ancestorId){
            array_push($trail, [
                'label' => get_the_title($ancestorId),
                'href' => get_permalink($ancestorId),
                'class' => 'mlsbc-parent-page'
            ]);
        }

        return array_reverse($trail);
    }

    private function getArchiveCrumbs() : array
    {
        $trail = [];

        if(is_post_type_archive()){
            // TODO - get the post type name
        } else {
            $term = get_term(get_queried_object()->term_id);

            array_push($trail, [
                'label' => $term->name,
                'href' => get_term_link($term->term_id),
                'class' => 'mlsbc-archive'
            ]);

            $parentTerm = $term; // this just starts the loop correctly
            while($parentTermId = wp_get_term_taxonomy_parent_id($parentTerm->term_id, $parentTerm->taxonomy)){
                $parentTerm = get_term($parentTermId);
                array_push($trail, [
                    'label' => $parentTerm->name,
                    'href' => get_term_link($parentTerm->term_id),
                    'class' => 'mlsbc-archive'
                ]);
            }
        }

        return array_reverse($trail);
    }

}