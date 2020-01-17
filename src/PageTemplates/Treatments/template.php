<?php

use Motionlab\TogetherDentalGroup\PageTemplates\Treatments\TreatmentsTemplate;

$templateController = new TreatmentsTemplate();
$blocks = $templateController->getBlocks(get_the_id());

get_header();
?>

<div>
    <h1>Treatments Template</h1>
    <pre>
        <?php $templateController->renderBlocks(get_the_id()); ?>
    </pre>
</div>

<?php
get_footer();
