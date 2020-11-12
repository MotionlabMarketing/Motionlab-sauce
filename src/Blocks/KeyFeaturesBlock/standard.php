<section class="clearfix px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container">

        <?php if (!empty($this->blockConfiguration['features_title'])) : ?>
            <h2 class="h1 text-center mb5"><?php echo $this->blockConfiguration['features_title']; ?></h2>
        <?php endif; ?>

        <div class="mxn4 md-flex flex-wrap">
            <?php foreach ($this->blockConfiguration['features_feature'] as $feature) : ?>
                <div class="px4 mb4 col-12 md-col-4 text-center">
                    <div class="flex items-center justify-center" data-mh="icon-height" style="max-height: 50px;">
                        <?php if ($feature['icon_type'] === 'custom') : ?>
                            <?php
                            if ($feature['icon_image']['subtype'] == "svg+xml") : ?>
                                <div data-element="svg-icon" style="max-height: 64px; max-width: 64px;">
                                    <?php echo file_get_contents(get_attached_file($feature['icon_image']['id'])); ?>
                                </div>
                            <?php else : ?>
                                <img src="<?php echo $feature['icon_image']['url']; ?>" alt="<?php echo $feature['icon_image']['alt']; ?>" style="max-height: 64px; max-width: 64px;">
                            <?php endif; ?>
                        <?php else : ?>
                            <span class="dark-purple h00"><?php echo $feature['feature_icon']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="lg-max-width-60 mx-auto" style="">
                        <?php echo $feature['feature_content']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>