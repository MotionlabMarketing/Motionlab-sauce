<?php
/**
* The single template for team members.
*/

$url = wp_get_attachment_url( get_post_thumbnail_id(), 'thumbnail' );

get_header();

?>

<main id="site-content" role="main">

    <section class="orverflow-hidden bg-grey" style="background-image:url('http://staging.masterframe.d3z.uk/wp-content/themes/masterframe-consumer/src/img/bygone-pattern@2x.png');">
        <div class="md-flex flex-row-reverse">
            <div class="col-12 md-col-6 lg-col-7 min-height-100 relative">
                <div class="bg-cover bg-center height-100 img-rounded" style="background-image:url('http://staging.masterframe.d3z.uk/wp-content/uploads/2020/02/DSC0272@2x-768x507.png');">
                    <div class="ratio-4-3"></div>
                </div>
                <div class="bg-white absolute left-0 top-0 height-100 display-none md-block" style="width:4px;margin-left:-2px;"></div>
            </div>
            <div class="col-12 md-col-6 lg-col-5 flex items-center">
                <div class="p4 lg-p6 wysiwyg width-100">
                    <h1 class="white h2 md-h1 mb2 text-left"><?php echo get_the_title(); ?></h1>
                    <h3 class="white bold"><?php echo get_field('team_member_role'); ?>Designer</h3>
                    <div class="white flex mt5 pt5 border-top border-lighten-5">
                        <div class="mb4 col-6">
                            <h4 class="bold white mb0">Phone</h4>
                            <p><?php echo get_field('team_member_phone_number'); ?>0123 456789</p>
                        </div>
                        <div class="mb4 col-6">
                            <h4 class="bold white mb0">Email</h4>
                            <p><?php echo get_field('team_member_email_address'); ?>hello@hikarl.co.uk</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="px4 py4 lg-py6">
            <div class="lh4 measure-super-wide mx-auto">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <?php echo get_field('team_member_bio'); ?>
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
