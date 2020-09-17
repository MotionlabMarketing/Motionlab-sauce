<?php

namespace Motionlab\Sauce\Blocks\CategoryListingsBlock;

use Motionlab\Sauce\Blocks\Block;

class CategoryListingsBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5f621e44af40a',
        'title' => 'Block - Category Listings',
        'fields' => array(
            array(
                'key' => 'field_5f622102036a3',
                'label' => 'Title',
                'name' => 'category_listings_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5f622170036a5',
                'label' => 'Post Type',
                'name' => 'category_listings_post_type',
                'type' => 'text',
                'instructions' => 'Enter a post type slug',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'posts',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5f6221e1036a6',
                'label' => 'Category / Taxonomy',
                'name' => 'category_listings_taxonomy',
                'type' => 'text',
                'instructions' => 'Enter a taxonomy slug',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5f622139036a4',
                'label' => 'Pluralisation',
                'name' => 'category_listings_pluralisation',
                'type' => 'text',
                'instructions' => 'This will follow the number in the count statement. E.g. "6 posts" or "3 services"',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'posts',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5f62239e036a7',
                'label' => 'Layout',
                'name' => 'category_listings_layout',
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
                ),
                'default_value' => 'default',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
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
        'active' => true,
        'description' => '',
    );

    public $title;
    public $pluralisation;
    public $taxonomy;
    public $taxonomyTerms;

    public function init()
    {
        $this->title = $this->blockConfiguration['category_listings_title'];
        $this->pluralisation =
            (strlen($this->blockConfiguration['category_listings_pluralisation']))
                ? $this->blockConfiguration['category_listings_pluralisation']
                : 'posts';
        $layout = $this->blockConfiguration['category_listings_layout'];

        $this->loadTaxonomyTerms();

        switch($layout) {
            default:
                include(__DIR__ . '/block.php');
                break;
        }
    }

    private function loadTaxonomyTerms()
    {
        $postType = $this->blockConfiguration['category_listings_post_type'];
        $this->taxonomy = $this->blockConfiguration['category_listings_taxonomy'];

        $postIds = get_posts([
            'post_type' => $postType,
            'posts_per_page' => -1,
            'fields' => 'ids',
            'tax_query' => [
                [
                    'taxonomy' => $this->taxonomy,
                    'field' => 'slug',
                ]
            ],
        ]);

        $this->taxonomyTerms = get_terms($this->taxonomy, [
            'object_ids' => $postIds,
            'hide_empty' => false,
        ]);
    }

}