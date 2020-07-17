<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Title: $this->blockConfiguration['team_title']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

$terms = $this->getTaxonomyTerms("roles");

$members = $this->getTeamMembers();

?>
<?php if (!empty($members)) : ?>
    <section class="clearfix px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?> || filtering" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
        <div class="container">
            <h2 class="h1 text-center"><?php echo $this->blockConfiguration['team_title']; ?></h2>

            <div class="mb4 text-center">
                <select class="select" style="min-width:15rem;">
                    <option value="cat-all" selected="selected">All</option>
                    <?php foreach ($terms as $term) : ?>
                        <option value="cat-<?php echo $term->name . "-" . $this->buid; ?>"><?php echo $term->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mxn2 flex justify-center flex-wrap || filter-cat-results">
                <?php foreach ($members as $member) : ?>
                    <div class="px2 col-12 md-col-6 lg-col-4 mb3 || f-cat" data-cat="cat-<?php echo $member['role'] . "-" . $this->buid; ?>">
                        <div class="bg-smoke p3 rounded flex || js-match-height">
                            <div class="mr3">
                                <div class="circle overflow-hidden bg-center bg-repeat-none bg-cover bg-white" style="width:7rem; background-size: 100%; background-image:url('<?php echo $member['image']; ?>');">
                                    <div class="square"></div>
                                </div>
                            </div>
                            <div class="">
                                <h3 class="h4 m0 dark-purple capitalize"><?php echo $member['name']; ?></h3>
                                <p class="bold black my1"> <?php echo $member['role']; ?> </p>
                                <div class="h5 m0 lh2 || child-p-m0"><?php echo $member['details']; ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>