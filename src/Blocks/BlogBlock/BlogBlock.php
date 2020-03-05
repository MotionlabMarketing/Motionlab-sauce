<?php


namespace Motionlab\Sauce\Blocks\BlogBlock;

use Motionlab\Sauce\Blocks\Block;
use WP_Query;

class BlogBlock extends Block
{
    public static $blockAcf = array(
        'key' => 'group_5dd6c5705ed5e',
        'title' => 'Block - Blog',
        'fields' => array(
            array(
                'key' => 'field_6cb93f41c7bd382c',
                'label' => 'Layout',
                'name' => 'blog_layout',
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
                    'basic' => '3 Column',
                    '4col' => '4 Column',
                    'slider' => 'Slider (9 posts)',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5dfb9bf164ae5',
                'label' => 'Background Colour',
                'name' => 'background_colour',
                'type' => 'clone',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'clone' => array(
                    0 => 'group_5dfb879fe9a51',
                ),
                'display' => 'seamless',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ),
            array(
                'key' => 'field_5df250e2e5b9e',
                'label' => 'Title',
                'name' => 'blog_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
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
                'key' => 'field_5dd6c5c3915ab',
                'label' => 'Content',
                'name' => 'blog_content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5dd6c574915aa',
                'label' => 'Display Type',
                'name' => 'blog_display_type',
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
                    'manual' => 'Manually Select',
                    'latest' => 'Latest Posts',
                    'category' => 'By Category',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_4aee7efe8816a',
                'label' => 'Blog Count',
                'name' => 'blog_count',
                'type' => 'number',
                'instructions' => 'How many posts do you want to display? Only applicable for 3 Column and 4 Column layouts. Leave post count field 0 to use the default for each layout.',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5dd6c574915aa',
                            'operator' => '==',
                            'value' => 'latest',
                        ),
                        array(
                            'field' => 'field_6cb93f41c7bd382c',
                            'operator' => '==',
                            'value' => '4col',
                        ),
                    ),
                    array(
                        array(
                            'field' => 'field_5dd6c574915aa',
                            'operator' => '==',
                            'value' => 'latest',
                        ),
                        array(
                            'field' => 'field_6cb93f41c7bd382c',
                            'operator' => '==',
                            'value' => 'basic',
                        ),
                    ),
                    array(
                        array(
                            'field' => 'field_5dd6c574915aa',
                            'operator' => '==',
                            'value' => 'category',
                        ),
                        array(
                            'field' => 'field_6cb93f41c7bd382c',
                            'operator' => '==',
                            'value' => 'basic',
                        ),
                    ),
                    array(
                        array(
                            'field' => 'field_5dd6c574915aa',
                            'operator' => '==',
                            'value' => 'category',
                        ),
                        array(
                            'field' => 'field_6cb93f41c7bd382c',
                            'operator' => '==',
                            'value' => '4col',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 0,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5e4c1268d0371',
                'label' => 'Selected Category',
                'name' => 'blog_selected_category',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5dd6c574915aa',
                            'operator' => '==',
                            'value' => 'category',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'taxonomy' => 'category',
                'field_type' => 'select',
                'allow_null' => 0,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object',
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5dd6c5dd915ad',
                'label' => 'Selected',
                'name' => 'blog_selected',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5dd6c574915aa',
                            'operator' => '==',
                            'value' => 'manual',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'post',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                    1 => 'taxonomy',
                ),
                'elements' => '',
                'min' => 3,
                'max' => 12,
                'return_format' => 'id',
            ),
            array(
                'key' => 'field_-0fb5b8ec42c0',
                'label' => 'Footer Button',
                'name' => 'blog_footer_button',
                'type' => 'link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
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
        'active' => false,
        'description' => '',
    );

    public $posts = [];

    public function init()
    {
        switch($this->blockConfiguration['blog_layout']) {
            case 'slider':
                $this->loadPosts($this->blockConfiguration['blog_count'] == 0 ? 9 : $this->blockConfiguration['blog_count']);
                include (__DIR__ . '/slider.php');
                break;
            case '4col':
                $this->loadPosts($this->blockConfiguration['blog_count'] == 0 ? 4 : $this->blockConfiguration['blog_count']);
                include (__DIR__ . '/four-column.php');
                break;
            default:
                $this->loadPosts($this->blockConfiguration['blog_count'] == 0 ? 6 : $this->blockConfiguration['blog_count']);
                include(__DIR__ . '/block.php'); // 3 col
                break;
        }
    }

    private function loadPosts($count) {
        $returnPosts = [];
        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $count,
            'orderby' => 'date',
            'order' => 'DESC'
        ];

        if ($this->blockConfiguration['blog_display_type'] === 'manual') {
            $args['post__in'] = $this->blockConfiguration['blog_selected'];
        } else if($this->blockConfiguration['blog_display_type'] === 'category') {
            if(isset($this->blockConfiguration['blog_selected_category']) && $this->blockConfiguration['blog_selected_category']->term_id) {
                $args['cat'] = $this->blockConfiguration['blog_selected_category']->term_id;
            }
        }

        $query = new WP_Query($args);

        foreach ($query->posts as $latestPost) {

            $fallbackImage = get_field('options_archive_defaults','option');
            $post = new \stdClass();
            $post->ID = $latestPost->ID;
            $post->date = $latestPost->post_date;
            $post->title = $latestPost->post_title;
            $post->excerpt = strlen($latestPost->post_excerpt)
                ? $latestPost->post_excerpt
                : __('');
            $post->permalink = get_post_permalink($post->ID);
            $post->featuredImage = strlen(get_the_post_thumbnail_url($post->ID, 'blog-block-image'))
                ? get_the_post_thumbnail_url($post->ID, 'blog-block-image')
                : $fallbackImage['default_archive_background']['sizes']['post-thumbnail'];
            $returnPosts[] = $post;
        }

        $this->posts = $returnPosts;
    }

    public function getPosts()
    {
        return $this->posts;
    }
}
