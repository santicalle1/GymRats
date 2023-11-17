<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/compras.css'); ?>">
    <title>Efectuar Envío</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AZQBCaHQ4lHq6OI-mMRoxPv8nHioysdo_lnwAWuXxHgD31c5-3Nvw-fs0_WTL_-ghOvt8WeoipePRltE"></script>
</head>
<body>
    <a href="<?= base_url('carrito') ?>" class="back-button">&#8592; Volver</a>
    <h2>Confirmar Compra</h2>
    <form id="confirmar-compra-form" action="procesar_compra.php" method="post">
        <div class="form-group">
            <label for="barrio">Barrio:</label>
            <input type="text" name="barrio" required>
        </div>

        <div class="form-group">
            <label for="calle">Calle:</label>
            <input type="text" name="calle" required>
        </div>

        <div class="form-group">
            <label for="provincia">Provincia:</label>
            <input type="text" name="provincia" required>
        </div>

        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" required>
        </div>

        <div class="form-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" name="codigo_postal" required>
        </div>

        <div class="form-group">
            <label for="numero_calle">Número de Calle:</label>
            <input type="text" name="numero_calle" required>
        </div>

        <div id="paypal-button-container"></div>

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
                                value: <?= $TOTAL ?>
                            }
                        }]
                    });
                },
                onCancel: function(data) {
                    alert('Pago cancelado');
                },
                onApprove: function(data, actions) {
                    actions.order.capture().then(function(details) {
                        window.location.href = "<?= base_url('inicio') ?>";
                    });
                }
            }).render('#paypal-button-container').then(function() {
                document.querySelector('#paypal-button-container .paypal-button').click();
            });
        </script>
    </form>
</body>
</html>
