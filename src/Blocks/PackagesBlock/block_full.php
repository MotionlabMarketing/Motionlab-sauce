<?php
    $packages = $this->getPackages();
?>

<section data-element="cta" class="relative mb4" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <?php foreach($packages as $package): ?>
        <div class="<?php echo $package['background_colour'] ?>">
            <span><?php echo $package['title'] ?></span>
            <span><?php echo $package['subtitle'] ?></span>
            <span><?php echo $package['features_header'] ?></span>
            <ul>
                <?php foreach($package['features'] as $feature): ?>
                    <li><?php echo $feature ?></li>
                <?php endforeach; ?>
            </ul>
            <span><?php echo $package['price'] ?></span>
            <div>
                <a></a>
            </div>
        </div>
    <?php endforeach; ?>

</section>