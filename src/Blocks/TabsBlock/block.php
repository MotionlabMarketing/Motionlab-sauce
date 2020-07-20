<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Tabs: $this->blockConfiguration['tabs_tab']
Each Tab includes:
Layout: $tab['tab_layout']
Content: $tab['tab_content']
Title: $tab['tab_title']
Display Type (video/image/vimeo): $tab['tab_display_type']
Image: $tab['tab_image']
Image: $tab['tab_image']
Video: $tab['tab_video']
Vimeo: $tab['tab_vimeo']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="container" data-tabs="wrapper">

        <nav class="md-flex md-mxn1" data-tabs="buttons">
            <?php
            //Loop over tabs to output tab headers
            foreach ($this->blockConfiguration['tabs_tab'] as $index => $tab) :
            ?>
                <button class="btn mb1 md-mb0 regular py3 h5 block semi-bold rounded uppercase md-rounded-top || <?php echo $index == 0 ? 'tab-active' : ''; ?>" data-section="tab<?php echo $index . $this->buid; ?>">
                    <?php echo $tab['tab_title'] ?>
                </button>
            <?php
            endforeach;
            ?>
        </nav>

        <div class="clearfix">
            <div data-tabs="content">
                <?php
                //Loop over tabs to output tab headers
                foreach ($this->blockConfiguration['tabs_tab'] as $index => $tab) :
                    // var_dump($tab);
                ?>
                    <section id="tab<?php echo $index . $this->buid; ?>" class="shadow my4 md-my0 bg-white rounded-bottom-right rounded-bottom-left rounded-top-right px4 py4 clearfix <?php echo $index != 0 ? 'hide' : ''; ?>">
                        <!-- TODO: Chris add video markup here so I can hook it up to the CMS -->

                        <?php if ($tab['tab_display_type'] === "video" && !empty($tab['tab_video'])) : ?>
                            <div class="<?php echo $tab['tab_layout'] == "image_left" ? "left mr4 " : "right ml4 " ?> col-12 md-col-6 mb4 md-mb0">
                                <video class="width-100 relative" src="<?php echo $tab['tab_video']['url']; ?>" controls="false">
                                    <source src="<?php echo $tab['tab_video']['url']; ?>" type="video/mp4">
                                </video>
                            </div>
                        <?php endif; ?>

                        <?php if ($tab['tab_display_type'] === "vimeo" && !empty($tab['tab_vimeo'])) : ?>
                            <div class="video-wrapper mb4 md-mb0 <?php echo $tab['tab_layout'] == "image_left" ? "left mr4 " : "right ml4 " ?> col-12 md-col-6">
                                <iframe src="https://player.vimeo.com/video/<?php echo $tab['tab_vimeo']; ?>?color=6198c4&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>

                        <?php if ($tab['tab_display_type'] === "image" && !empty($tab['tab_image'])) : ?>
                            <img src="<?php echo $tab["tab_image"]['sizes']['medium_large']; ?>" alt="" class="img-rounded <?php echo $tab['tab_layout'] == "image_left" ? "left mr4 " : "right ml4 " ?> col-12 md-col-6 mb4 md-mb0">
                        <?php endif; ?>

                        <div class="wysiwyg">
                            <?php echo $tab['tab_content']; ?>
                        </div>

                    </section>
                <?php
                endforeach;
                ?>
            </div>
        </div>

    </div>

</section>