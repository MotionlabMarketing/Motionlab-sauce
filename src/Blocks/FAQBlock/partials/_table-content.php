<table>
    <tbody>
        <?php foreach($row['faq_faqs_table_content']['body'] as $tableRow): ?>
            <tr>
                <?php foreach($tableRow as $tableColumn) :?>

                    <td><?php echo $tableColumn['c']; ?></td>

                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
