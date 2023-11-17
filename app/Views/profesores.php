<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GymRats</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/profesores.css'); ?>">
    <script src="https://www.paypal.com/sdk/js?client-id=AZQBCaHQ4lHq6OI-mMRoxPv8nHioysdo_lnwAWuXxHgD31c5-3Nvw-fs0_WTL_-ghOvt8WeoipePRltE"></script>
</head>
<?php
    include('header.php');
    ?>
<body>
    <div class="contenedor-profesores">
        <?php foreach ($profesores as $profesor): ?>
            <div class="card01">
                <img src="<?= base_url($profesor['imagen']) ?>" alt="Imagen del Profesor">
                <div class="content02">
                    <h2 class="title03"><?= esc($profesor['nombre']) ?></h2>
                    <p class="description04"><?= esc($profesor['titulos']) ?></p>
                    <p class="prof-detail"><strong>Dificultad:</strong> <?= esc($profesor['dificultad']) ?></p>
                    <p class="prof-detail"><strong>Horario:</strong> <?= esc($profesor['horarios']) ?></p>
                    <p class="prof-detail"><strong>Coste:</strong> $<?= esc($profesor['coste']) ?></p>
                    <div id="paypal-button-container-<?= $profesor['id_profesor'] ?>"></div>
                </div>
                <script>
    paypal.Buttons({
        style: {
            shape: 'pill',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: "<?= $profesor['coste'] ?>"
                    }
                }]
            });
        },
        onCancel: function(data) {
            alert('Pago cancelado');
        },
// ...

onApprove: function(data, actions) {
    
    window.location.href = "<?= base_url("panel_cliente/{$profesor['id_profesor']}") ?>";
}
    }).render('#paypal-button-container-<?= $profesor['id_profesor'] ?>').then(function() {
        // document.querySelector('#paypal-button-container-<?= $profesor['id_profesor'] ?> .paypal-button').click(); // Comentamos esta línea
    });
    

</script>


            </div>
        <?php endforeach; ?>
    </div>

    <?php
    include('footer.php');
    ?>
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous">
        // Agrega un evento de clic al botón Comprar Ahora
        document.getElementById('btn-comprar').addEventListener('click', function(event) {
            // Evita que el enlace se abra por defecto
            event.preventDefault();

            // Verifica si la variable de sesión user_id está definida en PHP
            // Si está definida, significa que el usuario está autenticado
            // Si no está definida, el usuario no está autenticado
            <?php if (isset($_SESSION['user_id'])) : ?>
                // El usuario está autenticado, redirige a la vista de tienda
                window.location.href = '<?= base_url("/tienda"); ?>';
            <?php else : ?>
                // El usuario no está autenticado, redirige a la página de inicio de sesión
                window.location.href = '<?= base_url("/login"); ?>';
            <?php endif; ?>
        });
    </script>
</body>

</html>
