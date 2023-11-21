<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/itemsdelete.css'); ?>">
    <title>Editar Cliente</title>
</head>
<body>
    <form action="<?= base_url("items_delete" . $item['id']) ?>" method="post">
<a href="items_delete<?= $item['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este Usuario?');">Eliminar</a>
        <input type="submit" value="Editar">
        <a href="<?= base_url("items_view"); ?>">Atras</a> 
    </form>
    <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

</body>
</html>