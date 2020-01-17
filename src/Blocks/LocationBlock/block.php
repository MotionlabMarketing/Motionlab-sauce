<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
    Selected Location: $this->blockConfiguration["location_selected_location"]
    Image by Map: $this->blockConfiguration["location_image"]
*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

$location = $this->getLocationDetails($this->blockConfiguration["location_selected_location"]);
?>

<section class="px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>">

    <div class="container xl-flex">

        <div class="col-12 xl-col-4 sm-flex xl-flex-column justify-center">
            <address class="md-h3 col-12 md-col-6 xl-col-12">
                <h3 class="md-h3 mb0 dark-purple">Address</h3>
                <?php echo strip_tags($location['address'], '<br><br/>'); ?>
            </address>
            <div class="col-12 md-col-6 mt4 xl-col-12 mt2 sm-mt0">
                <h3 class="md-h3 mt4 sm-mt0 xl-mt4 mb0 mt4 dark-purple">Email Address</h3>
                <?php if ($location['email'] && $location['email'] != "") :?>
                    <p class="mt0"><a href="mailto:<?php echo $location['email']; ?>" class="md-h3 dark-grey hover-primary" style="word-break: break-word;"><?php echo $location['email']; ?></a></p>
                <?php else :?>
                    <p class="mt0"><a href="" class="md-h3 dark-grey">Not provided</a></p>
                <?php endif; ?>
                <h3 class="md-h3 mb0 mt4 dark-purple">Phone</h3>
                <p class="mt0"><a href="tel:<?php echo $location['phone']; ?>" class="md-h3 dark-grey hover-primary"><?php echo $location['phone']; ?></a></p>
            </div>
        </div>
        <div class="xl-12 xl-col-8 md-flex">
            <div class="col-12 md-col-6">
                <div class="bg-light-grey">
                    <div class="bg-cover bg-center" style="min-height: 12rem; background-image: url(<?php echo $this->blockConfiguration["location_image"]["sizes"]["location-block-image"]; ?>);"></div>
                    <div class="px4 py3">
                        <h4 class="bold">Opening Hours</h4>
                        <ul class="list-reset m0 p0">
                            <?php
                                foreach ($location['opening_times'] as $openingTime):
                            ?>
                                <li class="flex" style="margin-bottom: 0;"><span style="width:7rem;"><?php echo $openingTime['opening_hours_day']; ?></span><span><?php echo $openingTime['opening_hours_time']; ?></span></li>
                            <?php
                                endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 md-col-6 relative bg-light-grey">
            <iframe
                width="100%"
                height="100%"
                src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=<?php echo urlencode($location['name'] . " " . $location['postcode']); ?>&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                frameborder="0"
                scrolling="no"
                marginheight="0"
                marginwidth="0"
            ></iframe></div>
        </div>

    </div>

</section>
