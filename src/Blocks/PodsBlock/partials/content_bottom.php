<div class="col col-12 md-col-4 p3" data-element="pod" data-style="content_top">

    <?php if (!empty($pod['pod_link'])) : ?>
        <a href="<?php echo $pod['pod_link']; ?>" class="block">
        <?php endif; ?>

        <div class="bg-white box-shadow">
            <?php if (!empty($pod['pod_background_image'])) : ?>
                <div data-element="pod-image">
                    <img src="<?php echo $pod['pod_background_image']['sizes']['block-pods-image']; ?>" alt="<?php echo $pod['pod_background_image']['alt']; ?>" class="block">
                </div>
            <?php endif; ?>
            <div class="p4" data-element="pod-content" data-mh="pod-content">
                <?php if (!empty($pod['pod_title'])) : ?>
                    <p class="pod-title h3 body heading"><?php echo $pod['pod_title']; ?></p>
                <?php endif; ?>
                <?php if (!empty($pod['pod_content'])) : ?>
                    <div class="pod-content h4 body"><?php echo strip_tags($pod['pod_content'], "<p><h2><h3><h4><span><a>"); ?></div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($pod['pod_link'])) : ?>
        </a>
    <?php endif; ?>

</div>