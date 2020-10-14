<?php
$pods = array_slice($this->blockConfiguration['pods_pods'], 0, 6);

/**
 * TODO: Joe Curran
 * You should be able to query $this->blockConfiguration['pods_content_layout'] to decide which body content to display.
 * if not set, default should be /partials/standard.php
 * options include:
 * $this->blockConfiguration['pods_content_layout'] == "standard" -> /partials/standard.php
 * $this->blockConfiguration['pods_content_layout'] == "top" -> /partials/content-top.php
 * $this->blockConfiguration['pods_content_layout'] == "bottom" -> /partials/content-bottom.php
 */
?>

<section class="py6 px4 display-none md-block" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container">
        <div class="clearfix mxn3">
            <?php
            foreach ($pods as $key => $pod) :
                switch ($this->blockConfiguration['pods_content_layout']) {
                    case "top":
                        include('partials/content_top.php');
                        break;
                    case "bottom":
                        include('partials/content_bottom.php');
                        break;
                    default:
                        include('partials/content_standard.php');
                    break;  
                }
            endforeach;
            ?>
        </div>
    </div>
</section>