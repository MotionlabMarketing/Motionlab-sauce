<table data-table="responsive" data-table-id="<?php echo get_the_id() . "-" . $key; ?>">
    <?php if (!empty($row['faq_faqs_table_content']['header'])) : ?>
        <thead>
            <tr>
                <?php foreach ($row['faq_faqs_table_content']['header'] as $tableRow) : ?>
                    <td><span><?php echo $tableRow['c']; ?></span></td>
                <?php endforeach; ?>
            </tr>
        </thead>
    <?php endif; ?>
    <tbody>
        <?php foreach ($row['faq_faqs_table_content']['body'] as $key => $tableRow) : ?>
            <tr data-row-id="<?php echo get_the_id() . "-" . $key; ?>">
                <?php foreach ($tableRow as $tableColumn) : ?>

                    <td><div><?php echo $tableColumn['c']; ?></div></td>

                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>