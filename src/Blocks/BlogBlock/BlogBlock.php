<?php


namespace Motionlab\Sauce\Blocks\BlogBlock;

use Motionlab\Sauce\Blocks\Block;
use WP_Query;

class BlogBlock extends Block
{
    public $posts = [];

    public function init()
    {
        switch($this->blockConfiguration['blog_layout']) {
            case 'slider':
                $this->loadPosts(9);
                include (__DIR__ . '/slider.php');
                break;
            case '4col':
                $this->loadPosts(4);
                include (__DIR__ . '/four-column.php');
                break;
            default:
                $this->loadPosts(3);
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
            $post = new \stdClass();
            $post->ID = $latestPost->ID;
            $post->date = $latestPost->post_date;
            $post->title = $latestPost->post_title;
            $post->excerpt = strlen($latestPost->post_excerpt)
                ? $latestPost->post_excerpt
                : __('NO EXCERPT – Please include one on this post!');
            $post->permalink = get_post_permalink($post->ID);
            $post->featuredImage = strlen(get_the_post_thumbnail_url($post->ID, 'blog-block-image'))
                ? get_the_post_thumbnail_url($post->ID, 'blog-block-image')
                : \get_template_directory_uri() . "/dist/images/news-thumbnail-default.jpg";
            $returnPosts[] = $post;
        }

        $this->posts = $returnPosts;
    }

    public function getPosts()
    {
        return $this->posts;
    }
}
