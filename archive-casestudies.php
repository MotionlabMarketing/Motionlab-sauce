<?php

get_header();

$caseStudyCategories = get_terms('case-study-categories', array('hide_empty' => false));
$caseStudyRanges = get_terms('case-study-ranges', array('hide_empty' => false));

?>

    <section class="">

        <main class="container clearfix py4">

            <div class="col col-12">
                <h1 class="h0 text-center">
                    <span>
                        Case Studies
                    </span>
                </h1>
            </div>

            <div>
                <form method="get" action="#">
                    <select name="case-study-categories" value="<?php echo isset($_GET['case-study-categories']) ? $_GET['case-study-categories'] : ''; ?>" autocomplete="false">
                        <option value=""> Category </option>
                        <?php foreach($caseStudyCategories as $category): ?>
                            <option value="<?php echo $category->slug; ?>" <?php echo isset($_GET['case-study-categories']) && $_GET['case-study-categories'] == $category->slug ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="case-study-ranges" value="<?php echo isset($_GET['case-study-ranges']) ? $_GET['case-study-ranges'] : ''; ?>" autocomplete="false">
                        <option value=""> Range </option>
                        <?php foreach($caseStudyRanges as $range): ?>
                            <option value="<?php echo $range->slug; ?>" <?php echo isset($_GET['case-study-ranges']) && $_GET['case-study-ranges'] == $range->slug ? 'selected' : ''; ?>><?php echo $range->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="order" value="<?php echo isset($_GET['order']) ? $_GET['order'] : ''; ?>" autocomplete="false">
                        <option value=""> Order By </option>
                        <option value="asc" <?php echo isset($_GET['order']) && $_GET['order'] == "asc" ? 'selected' : ''; ?>> Date Asc </option>
                        <option value="desc" <?php echo isset($_GET['order']) && $_GET['order'] == "desc" ? 'selected' : ''; ?>> Date Desc </option>
                    </select>
                    <input type="hidden" name="orderby" value="date"/>
                    <button type="submit"> Go </button>
                </form>
            </div>

            <div class="clearfix">
                <?php

                if (have_posts()) :
                    $i = 0;
                    while (have_posts()) : the_post();

                        echo "<div class='col col-12 md-col-5 lg-col-4 md-hover-zoom'>";
                        include('template-parts/post.php');
                        echo "</div>";
                        $i++;

                    endwhile;
                else: ?>
                    <p>We have no Case Studies to show. Try changing your filters.</p>
                <?php
                endif;
                ?>
            </div>

            <div class="pagination my4">
                <?php echo paginate_links(); ?>
            </div>

        </main>

    </section>


<?php

get_footer();
