<?php require_once 'inc/html_header.php'; ?>

<div>
    <a href="/events/edit" role="button" class="btn btn-primary mt-0 mb-3">Neues Events anlegen</a>
</div>

<?php if (isset($list) && count($list) > 0) : ?>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Datum</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($list as $item) : ?>
            <tr>
                <td><?php echo $item['id']; ?></td>                
                <td><a href="/events/<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></td>
                <td><?php echo $item['event_date']; ?></td>  
                <td class="colButtons">
                    <a href="/events/edit/<?php echo $item['id']; ?>" class="btn-sm btn-primary" role="button">Edit</a>
                    <a href="/events/delete/<?php echo $item['id']; ?>" class="btn-sm btn-danger ml-1 delsoft" role="button">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else : ?>
    <h3>Keine Daten vorhanden</h3>
<?php endif; ?>

<?php require_once 'inc/html_footer.php'; ?>