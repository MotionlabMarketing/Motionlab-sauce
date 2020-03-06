<?php //you might have to use get_field($teamMember->ID) to pull out more info. ?>

<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>">
    <div class="md-flex">
        <div class="col-12 md-col-6 lg-col-5 flex items-center">
            <div class="p4 lg-p6 <?php echo  $this->blockConfiguration['background_colour'] = 'white' ? '' : 'white';?>">
                <h3 class="<?php echo  $this->blockConfiguration['background_colour'] = 'white' ? '' : 'white';?> h2">
                    <?php echo $this->blockConfiguration['team_title']; ?>
                </h3>
                <?php echo $this->blockConfiguration['team_content']; ?>

                <?php if($this->blockConfiguration['team_page_link']) :?>
                    <a
                            href="<?php echo $this->blockConfiguration['team_page_link']['url']; ?>"
                            target="<?php echo $this->blockConfiguration['team_page_link']['target']; ?>"
                            class="btn border border-grey grey mx1 uppercase"
                    >
                        <?php echo $this->blockConfiguration['team_page_link']['title'] ?>
                    </a>
                <?php endif; ?>

            </div>
        </div>
        <div class="col-12 md-col-6 lg-col-7 min-height-100">
            <div class="flex flex-wrap min-height-100" style="margin: -2px;">
                <?php foreach($this->blockConfiguration['team_members_selected'] as $teamMember):?>
                    <div class="col-4 bg-cover bg-center border border-white relative hover-reveal" style="background-image:url('<?php echo wp_get_attachment_image_url(get_post_thumbnail_id($teamMember->ID), 'medium')?>');border-width:2px; cursor: help;">
                        <a href="/" class="block">
                            <div style="padding-bottom: 105%;"></div>
                            <div class="reveal md-block absolute top-0 left-0 width-100 height-100 bg-darken-5 flex flex-column items-center justify-center">
                                <h3 class="white <?php $link = true ? 'mb0' : '';?> bold"><?php echo $teamMember->post_title; ?></h3>
                                <?php if('$link'):?>
                                    <p class="white">View Profile</p>
                                <?php endif;?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
