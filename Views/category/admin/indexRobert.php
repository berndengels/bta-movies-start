<?php require_once 'inc/html_header.php'; ?>

<div>
<<<<<<< HEAD
    <a href="/categories/edit" role="button" class="btn btn-primary mt-0 mb-3">Neue Category anlegen</a>
=======
    <a href="/categories/edit" role="button" class="btn btn-primary mt-0 mb-3">Neue Kategorie anlegen</a>
>>>>>>> main
</div>

<?php if (isset($list) && count($list) > 0) : ?>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($list as $item) : ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><a href="/categories/<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></td>
                <td class="colButtons">
                    <a href="/categories/edit/<?php echo $item['id']; ?>" class="btn-sm btn-primary" role="button">Edit</a>
                    <a href="/categories/delete/<?php echo $item['id']; ?>" class="btn-sm btn-danger ml-1 delsoft" role="button">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else : ?>
    <h3>Keine Daten vorhanden</h3>
<?php endif; ?>

<<<<<<< HEAD
<?php require_once 'inc/html_footer.php'; ?>
=======
<?php require_once 'inc/html_footer.php'; ?>
>>>>>>> main
