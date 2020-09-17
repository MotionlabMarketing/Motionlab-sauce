<div>
    <h2><?php echo $this->title ?></h2>
    <?php foreach($this->taxonomyTerms as $term): ?>
        <?php $icon = get_field('term_icon', $term) ?>
        <div>
            <a href="<?php get_term_link($term->name, $this->taxonomy) ?>">
                <?php if($icon): ?><span>$icon</span><?php endif; ?>
                <span><?php echo $term->name; ?></span>
                <span><?php echo $term->count . ' ' . $this->pluralisation ; ?></span>
            </a>
        </div>
    <?php endforeach; ?>
</div>
