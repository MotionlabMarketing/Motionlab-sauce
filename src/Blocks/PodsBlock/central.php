<?php

$leftPods = array_slice($this->blockConfiguration['pods_pods'], 0, 2);
$centralPod = array_slice($this->blockConfiguration['pods_pods'], 2, 1);
$rightPods = array_slice($this->blockConfiguration['pods_pods'], 3, 2);

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

?>

<section class="py6 px4 display-none md-block" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container">
        <div class="mxn3 flex flex-wrap lg-flex-nowrap">
            <div class="px3 col-12 sm-col-6 lg-col-6 lg-mb0">
                <?php foreach ($leftPods as $index => $lPod) : ?>

                    <?php if ($index == 0) : ?>
                        <div class="block mb5 bg-primary relative">
                            <div class="ratio-4-3"></div>
                            <div class="p4 absolute left-0 top-0 width-100 height-100 flex items-center">
                                <div class="">
                                    <h2 class="white mb2"><?php echo $lPod['pod_title']; ?></h2>
                                    <div class="white h5 display-none md-block"><?php echo $lPod['pod_content'] ?></div>
                                    <a href="<?php echo $lPod['pod_link']; ?>" class="btn btn-secondary h4">Discover More</a>
                                </div>
                            </div>
                        </div>
                    <?php continue;
                    endif; ?>

                    <a href="<?php echo $lPod['pod_link']; ?>" class="block bg-black bg-cover bg-center relative hover-reveal" style="background-image: url('<?php echo $lPod['pod_background_image']['sizes']['medium']; ?>');">
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

            <?php foreach ($centralPod as $cPod) : ?>
                <div class="px3 col-12 sm-col-6 lg-col-6 mb5 lg-mb0">
                    <a href="<?php echo $cPod['pod_link']; ?>" class="block mb5 bg-black height-100 bg-cover bg-center relative hover-reveal" style="background-image: url('<?php echo $cPod['pod_background_image']['sizes']['large']; ?>');">
                        <div class="py3 px4 absolute top-0 height-100 width-100 bg-darken-8 flex items-center z2 reveal">
                            <div class="">
                                <h3 class="white width-100"><?php echo $cPod['pod_title']; ?></h3>
                                <div class="white h5 display-none md-block"><?php echo $cPod['pod_content'] ?></div>
                            </div>
                            <i class="fa fa-chevron-down white absolute bottom-0 right-0 p4"></i>
                        </div>
                        <div class="py3 px4 absolute bottom-0 width-100 bg-darken-8 flex items-center || pod-anchored-title">
                            <h3 class="mb0 white width-100"><?php echo $cPod['pod_title']; ?></h3>
                            <i class="fa fa-chevron-up white"></i>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

            <div class="px3 col-12 lg-col-6">
                <div class="mxn3 sm-flex lg-flex-wrap">
                    <?php foreach ($rightPods as $index => $rPod) : ?>
                        <div class="px3 col-12 sm-col-6 md-col-12">
                            <a href="#" class="block bg-black bg-cover bg-center relative <?php echo $index == 0 ? 'mb5' : ''; ?> hover-reveal" style="background-image: url('<?php echo $rPod['pod_background_image']['sizes']['medium']; ?>');">
                                <div class="ratio-4-3"></div>
                                <div class="py3 px4 absolute top-0 height-100 width-100 bg-darken-8 flex items-center z2 reveal">
                                    <div class="">
                                        <h3 class="white width-100"><?php echo $rPod['pod_title']; ?></h3>
                                        <div class="white h5 display-none md-block"><?php echo $rPod['pod_content'] ?></div>
                                    </div>
                                    <i class="fa fa-chevron-down white absolute bottom-0 right-0 p4"></i>
                                </div>
                                <div class="py3 px4 absolute bottom-0 width-100 bg-darken-8 flex items-center || pod-anchored-title">
                                    <h3 class="mb0 white width-100"><?php echo $rPod['pod_title']; ?></h3>
                                    <i class="fa fa-chevron-up white"></i>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>