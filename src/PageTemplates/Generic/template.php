<?php

use Motionlab\Sauce\PageTemplates\Generic\GenericTemplate;

$templateController = new GenericTemplate();
$blocks = $templateController->getBlocks(get_the_id());

get_header();
?>

<div class="content-wrap">
    <?php $templateController->renderBreadcrumbs(get_stylesheet_directory().'/src/template_parts/breadcrumbs.php'); ?>
    <?php $templateController->renderFlexibleContent(get_the_id()); ?>
</div>

<?php
get_footer();
