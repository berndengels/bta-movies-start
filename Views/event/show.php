<?php require_once 'inc/html_header.php'; ?>

<?php if (isset($item) && is_array($item)) : ?>
    <table class="table table-striped">
        <tr>
            <th>ID:</th>
            <td><?php echo $item['id']; ?></td>
        </tr>
        <tr>
            <th>Titel:</th>
            <td><?php echo $item['title']; ?></td>
        </tr>        
        <tr>
            <th>Kategorie:</th>            
            <td><a href="/categories/<?php echo $item['category']['id']; ?>"><?php echo $item['category']['name']; ?></a></td>
        </tr>
        <tr>
            <th>Datum:</th>
            <td><?php echo $item['event_date']; ?></td>
        </tr>
        <tr>
            <th>Beschreibung:</th>
            <td><?php echo $item['description']; ?></td>
        </tr>        
    </table>
<?php else : ?>
    <h3>Keine Daten vorhanden</h3>
<?php endif; ?>

<?php require_once 'inc/html_footer.php'; ?>