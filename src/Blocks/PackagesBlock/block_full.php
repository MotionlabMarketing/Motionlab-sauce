<?php
$packages = $this->getPackages();
?>

<section data-element="cta" class="relative mb4" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="clearfix container">

        <div class="col-9 mx-auto">
        <?php foreach ($packages as $package) : ?>
            <div class="col col-12 md-col-6 p2" data-element="package" data-package-type="<?php echo (isset($package['is_featured']) && $package['is_featured'] == true) ? "featured" : "standard" ?>">
                <?php // @@ DEVELOPER : Remove bg-grey when background_colour is ficed; 
                $package['background_colour']['background_colour'] = "bg-grey"
                ?>
                <div class="relative p4 <?php echo $package['background_colour']['background_colour'] ?>" data-mh="package">
                    <h2 class="title white heading-font h2 <?php echo (!empty($package['subtitle'])) ? "mb2" : "mb3"; ?>"><?php echo $package['title']; ?></h2>
                    <?php if (!empty($package['subtitle'])) : ?>
                        <h3 class="mb3 white heading-font h4 uppercase"><?php echo $package['subtitle'] ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($package['features_header'])) : ?>
                        <p class="sub-title white body h5 bold uppercase"><?php echo $package['features_header'] ?></p>
                    <?php endif; ?>
                    <ul class="list h5 white mt-3 mb-3">
                        <?php foreach ($package['features'] as $feature) : ?>
                            <li><?php echo $feature['feature'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="footer">
                        <?php if (!empty($package['price'])) : ?>
                            <p class="price mt4 mb2 heading-font h3 white"><?php echo $package['price'] ?></p>
                        <?php endif; ?>
                        <div>
                            <a href="<?php echo $package['link_location'] ?>" data-element="button" class="button heading-font h3 bg-white hover-white <?php echo str_replace("bg-", "", $package['background_colour']['background_colour']); ?> hover-bg-aqua"><?php echo $package['link_title'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>


    </div>


</section>