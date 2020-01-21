<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
    Content: $this->blockConfiguration["location_finder_content"]
    Background Colour: $this->blockConfiguration["location_finder_background_colour"]
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="px4 py4" <?php echo (!empty($this->blockConfiguration["location_finder_background_colour"])) ? "style='background-color: {$this->blockConfiguration["location_finder_background_colour"]}'":""; ?>>
    <div class="container md-flex justify-center items-center">
        <div class="mr4 text-center md-text-left">
            <h3 class="black h2 md-mb0"><?php echo $this->blockConfiguration["location_finder_content"]; ?></h3>
        </div>
        <div class="">
            <form class="md-flex shadow rounded overflow-hidden" action="<?php echo get_site_url() . "/location-search-listings";?>" method="get">
                <input class="input h5 input-big rounded-left width-100 border-none" placeholder="Postcode/Location" type="text" name="p" value="" style="min-width:20rem;">
                <button class="btn btn-primary px4 rounded-bottom md-rounded-right bg-primary white h5 uppercase col-12" type="submit" name="button">Search our Locations</button>
            </form>
        </div>
    </div>
</section>
