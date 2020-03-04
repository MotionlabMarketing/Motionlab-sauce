<?php
/**
* The single template for team members.
*/

$url = wp_get_attachment_url( get_post_thumbnail_id(), 'thumbnail' );

get_header();

?>

<main id="site-content" role="main">

        <section class="py4 lg-py6 overflow-hidden">
            <div class="lh4 measure-super-wide mx-auto">
                <div class="relative">
                    <div class="absolute bottom-0 left-0 width-100 bg-grad-darken-5 p4">
                        <h1 class="white h2 md-h1 mb0 text-left"><?php echo get_the_title(); ?></h1>
                    </div>
                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'thumbnail' );?>" alt="" class="block">
                </div>
                <div class="px4 mt6">
                    <div class="mxn3 md-flex">
                        <div class="px3">
                            <h3 class="bold" style="width:7rem;">Info</h3>
                        </div>
                        <div class="px3 width-100">
                            <div class="mxn3 md-flex">
                                <div class="mb4 md-mb0 col-6 px3">
                                    <h4 class="bold">Role</h4>
                                    <p class="mb0"><?php echo get_field('team_member_role'); ?>Designer</p>
                                </div>
                                <div class="mb4 md-mb0 col-6 px3">
                                    <h4 class="bold">Phone</h4>
                                    <p class="mb0"><?php echo get_field('team_member_phone_number'); ?>0123 456789</p>
                                </div>
                                <div class="mb4 md-mb0 col-6 px3">
                                    <h4 class="bold">Email</h4>
                                    <p class="mb0"><?php echo get_field('team_member_email_address'); ?>hello@hikarl.co.uk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt6 py6 border-top border-darken-2">
                        <div class="mxn3 md-flex">
                            <div class="px3">
                                <h3 class="bold" style="width:7rem;">Biography</h3>
                            </div>
                            <div class="px3">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <?php echo get_field('team_member_bio'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="overflow-hidden bg-smoke py6">
            <h2><span>Meet more of our team</span></h2>
            <div class="mxn2 mt6 flex flex-wrap">
                <?php for($i=1; $i<=4; $i++): ?>
                    <div class="px2 col-6 md-col-3 text-center">
                        <a href="#" class="block relative hover-reveal">
                            <div class="reveal absolute top-0 left-0 width-100 height-100 bg-darken-5"></div>
                            <img alt="<?php echo get_the_title(); ?>" src="<?php echo $url ?>" class="block mb3" />
                        </a>
                        <h3 class="h4 sm-h3 px4 bold"><a href="#" class="grey hover-black"><?php echo get_the_title(); ?></a></h3>
                    </div>
                <?php endfor; ?>
            </div>
        </section>

    </main><!-- #site-content -->

    <?php get_footer(); ?>
