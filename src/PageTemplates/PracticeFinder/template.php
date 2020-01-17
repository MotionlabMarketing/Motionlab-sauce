<?php

use Motionlab\TogetherDentalGroup\PageTemplates\PracticeFinder\PracticeFinderTemplate;

$templateController = new PracticeFinderTemplate();
$blocks = $templateController->getBlocks(get_the_id());

$locations = $templateController->searchByPostcode();

get_header();

?>

<div class="bg-light-grey" id="map" style="height:30rem;"></div>

<section class="px4 py5">
    <div class="container mb5">
        <h1 class="mb0 text-center">Our Practices Near You</h1>
        <?php if (isset($_GET['p']) || !empty($_GET['p'])) : ?>
            <p class="mb0 text-center">Based on your search of "<strong class="uppercase"><?php echo $_GET['p']; ?></strong>" we have found the following practices in your area.</p>
        <?php endif; ?>
    </div>

<?php if (!isset($_GET['p']) || empty($_GET['p'])) : ?>
    <div class="container text-center mb5 bg-smoke flex items-center justify-center mtn3 p4 md-p3 rounded">
        <div class="md-flex items-center">
            <form class="md-flex items-center"  action="/practice-finder-listings//" methord="GET">
                <h3 class="mb0 mr3 text-center mb3 md-mb0">Search By Postcode <br class="md-display-none" />or Location Name:</h3>
                <input type="text" name="p" class="input mt0 text-center md-text-left" value="<?php echo $_GET['p']; ?>" placeholder="Find a dentist by postcode" style="width:20rem;">
                <button type="submit" class="btn ml2 bg-primary py2 white" style="height: 50px;">Search</button>
            </form>
        </div>
    </div>
<?php endif; ?>

    <?php foreach ($locations as $location): ?>
        <div class="container border mb5 rounded overflow-hidden">

            <div class="md-hide bg-cover min-height-v50" style="background-image:url(<?php echo $location['mapUrl']; ?>);">
            </div>

            <div class="p4 md-p3 md-flex justify-between bg-purple">
                <h2 class="white m0"><?php echo $location['name']; ?></h2>
                <div class="">
                    <?php if ($location['distance']): ?>
                        <span class="block md-inline-block h5 white mr3 bold mb2 md-mb0 opacity-5"><?php echo $location['distance']; ?> miles away</span>
                    <?php endif; ?>
                    <a href="<?php echo $location['website']; ?>" class="btn btn-primary px4 mt3 md-mt0 bg-white purple h5 uppercase block text-center md-inline-block">View Practice</a>
                </div>
            </div>

            <div class="xl-flex">

                <div class="col-12 xl-col-4 sm-flex xl-flex-column justify-center p4">
                    <address class="col-12 md-col-6 xl-col-12">
                        <h4 class="mb0 dark-purple">Address</h4>
                        <?php echo $location['address'];?>
                    </address>
                    <div class="col-12 md-col-6 mt4 xl-col-12 mt2 sm-mt0">
                        <h4 class="mb0 mt4 dark-purple">Email Address</h4>
                        <p class="mt0"><a href="mailto:<?php echo $location['email']; ?>" class="black" style="word-break: break-word;"><?php echo $location['email']; ?></a></p>
                        <h4 class="mb0 mt4 dark-purple">Phone</h4>
                        <p class="mt0"><a href="tel:<?php echo $location['phone']; ?>" class="black"><?php echo $location['phone']; ?></a></p>
                    </div>
                </div>
                <div class="xl-12 xl-col-8 md-flex">
                    <div class="col-12 md-col-6 p4 bg-light-grey">
                        <h4>Opening Hours</h4>
                        <ul class="list-reset m0 p0">
                            <?php
                            foreach ($location['opening_times'] as $openingTime):
                                ?>
                                <li class="flex"><span style="width:10rem;"><?php echo $openingTime['opening_hours_day']; ?></span><span><?php echo $openingTime['opening_hours_time']; ?></span></li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    <div class="col-12 md-col-6 bg-light-grey md-show bg-cover" style="background-image:url(<?php echo $location['mapUrl']; ?>);">
                    </div>
                </div>

            </div>

        </div>
    <?php endforeach; ?>
</section>

<script>
    function initMap() {
        // The location of Uluru
        var uluru = {lat: <?php echo $templateController->latLng['lat']; ?>, lng: <?php echo $templateController->latLng['lng']; ?>};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 8, center: uluru}
        );

        var marker = new google.maps.Marker({position: uluru, map: map, icon: {
            url: "https://maps.google.com/mapfiles/ms/icons/blue.png"
        }});
        let markers = [];
        <?php foreach ($locations as $location) : ?>
            markers.push(new google.maps.Marker({
                position: { lat: <?php echo $location['lat']; ?>, lng: <?php echo $location['lng']; ?> },
                map: map,
                icon: {
                    url: "https://maps.google.com/mapfiles/ms/icons/purple-dot.png"
                }
            }))
        <?php endforeach; ?>
    }
</script>

<?php
get_footer();
