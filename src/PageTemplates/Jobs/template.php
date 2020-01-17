<?php

use Motionlab\Sauce\PageTemplates\Jobs\JobsTemplate;

$templateController = new JobsTemplate();
$blocks = $templateController->getBlocks(get_the_id());

get_header();
?>

<div class="content-wrap">
    <?php $templateController->renderFlexibleContent(get_the_id()); ?>
</div>

<?php
get_footer();
