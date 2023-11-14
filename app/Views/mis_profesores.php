<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Profesores</title>
</head>

<body>
    <h2>Mis Profesores</h2>

    <?php if (session()->has('success')): ?>
        <p><?= session('success') ?></p>
    <?php endif; ?>

    <!-- Aquí puedes mostrar la lista de profesores comprados -->
    <?php if (isset($misProfesores) && is_array($misProfesores)): ?>
    <?php foreach ($profesor as $profe): ?>
        <div class="profesor">
            <h3><?= esc($profe['nombre']) ?></h3>
            <p><strong>Dificultad:</strong> <?= esc($profe['dificultad']) ?></p>
            <p><strong>Horario:</strong> <?= esc($profe['horarios']) ?></p>
            <p><strong>Coste:</strong> $<?= esc($profe['coste']) ?></p>
            <!-- Agrega más detalles según tus necesidades -->
        </div>
    <?php endforeach; ?>
    <?php else: ?>
    <p>No se encontraron profesores.</p>
<?php endif; ?>
</body>

</html>


