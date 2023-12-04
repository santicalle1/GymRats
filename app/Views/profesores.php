<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GymRats</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/profesores.css'); ?>">
    <script src="https://www.paypal.com/sdk/js?client-id=AZQBCaHQ4lHq6OI-mMRoxPv8nHioysdo_lnwAWuXxHgD31c5-3Nvw-fs0_WTL_-ghOvt8WeoipePRltE"></script>
    <?php
    include('header.php');
    ?>
</head>

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
        onApprove: function(data, actions) {
            actions.order.capture().then(function(details) {
                // Hace una solicitud para procesar la compra en el servidor
                // Aquí debes incluir el id_profesor para identificar al profesor específico
                fetch('<?= base_url("ProfesoresController/procesarCompra/{$profesor['id_profesor']}") ?>', {
                        method: 'GET',
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Redirige a la vista de mis profesores con los detalles necesarios
                        window.location.href = "<?= base_url("ProfesoresController/unprofe/{$profesor['id_profesor']}") ?>";

                    })
                    .catch(error => {
                        console.error('Error al procesar la compra:', error);
                        // Manejar el error según sea necesario
                    });
            });
            window.location.href = "<?= base_url("ProfesoresController/unprofe/{$profesor['id_profesor']}") ?>";
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
</body>

</html>
