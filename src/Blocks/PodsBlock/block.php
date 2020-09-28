<?php
$pods = array_slice($this->blockConfiguration['pods_pods'], 0, 6);

/**
 * TODO: Joe Curran
 * You should be able to query $this->blockConfiguration['pods_content_layout'] to decide which body content to display.
 * if not set, default should be /partials/standard.php
 * options include:
 * $this->blockConfiguration['pods_content_layout'] == "standard" -> /partials/standard.php
 * $this->blockConfiguration['pods_content_layout'] == "top" -> /partials/content-top.php
 * $this->blockConfiguration['pods_content_layout'] == "standard" -> /partials/content-bottom.php
 */
?>



<section class="py6 px4 display-none md-block" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container">
        <div class="mxn3 flex flex-wrap lg-flex-nowrap min-height-v50">
            <?php foreach ($pods as $index => $lPod) : ?>
                <a href="<?php echo $lPod['pod_link']; ?>" class="mx4 block bg-black bg-cover bg-center relative hover-reveal width-100" style="background-image: url('<?php echo $lPod['pod_background_image']['sizes']['medium']; ?>');">
                    <div class="ratio-4-3"></div>
                    <div class="py3 px4 absolute top-0 height-100 width-100 bg-darken-8 flex items-center z2 reveal">
                        <div class="">
                            <h3 class="white width-100"><?php echo $lPod['pod_title']; ?></h3>
                            <div class="white h5 display-none md-block"><?php echo $lPod['pod_content'] ?></div>
                        </div>
                        <i class="fa fa-chevron-down white absolute bottom-0 right-0 p4"></i>
                    </div>
                    <div class="py3 px4 absolute bottom-0 width-100 bg-darken-8 flex items-center || pod-anchored-title">
                        <h3 class="mb0 white width-100"><?php echo $lPod['pod_title']; ?></h3>
                        <i class="fa fa-chevron-up white"></i>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>