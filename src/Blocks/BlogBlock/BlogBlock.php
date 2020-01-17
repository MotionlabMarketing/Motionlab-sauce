<?php


namespace Motionlab\Sauce\Blocks\BlogBlock;

use Motionlab\Sauce\Blocks\Block;
use WP_Query;

class BlogBlock extends Block
{
    public $posts = [];

    public function init()
    {
        $this->loadPosts();
        include(__DIR__ . '/block.php');
    }

    private function loadPosts()
    {
        $returnPosts = [];
        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC'
        ];

        if ($this->blockConfiguration['blog_display_type'] === 'manual') {
            $args['post__in'] = $this->blockConfiguration['blog_selected'];
        } elseif ($this->blockConfiguration['blog_display_type'] === 'latest') {
            // switch to the master site
            switch_to_blog(get_network()->site_id);
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

        // return to the current site
        restore_current_blog();
        $this->posts = $returnPosts;
    }

    public function getPosts()
    {
        return $this->posts;
    }
}
