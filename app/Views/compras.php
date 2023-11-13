<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efectuar Envío</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AZQBCaHQ4lHq6OI-mMRoxPv8nHioysdo_lnwAWuXxHgD31c5-3Nvw-fs0_WTL_-ghOvt8WeoipePRltE"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .back-button {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #2980b9;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 15px;
            width: 100%;
        }

        label {
            flex: 1;
            margin-right: 10px;
        }

        input {
            flex: 2;
            padding: 8px;
        }

        #paypal-button-container {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <a href="<?= base_url('carrito') ?>" class="back-button">&#8592; Volver</a>
    <h2>Confirmar Compra</h2>
    <form id="confirmar-compra-form" action="<?= base_url('procesarCompra') ?>" method="post">
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
    var total = <?= isset($total) ? $total : 0 ?>;
 // Aquí obtienes el total del carrito desde PHP

    paypal.Buttons({
        style: {
            shape: 'pill',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',
        },
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total.toString() // Convierte el valor a cadena
                    }
                }]
            });
        },
        onCancel: function (data) {
            alert('Pago cancelado');
        },
        onApprove: function (data, actions) {
            window.location.href = "<?= base_url('procesarCompra') ?>";
            console.log('Pago aprobado. Detalles:', data, actions);
        }
    }).render('#paypal-button-container');
</script>
    </form>
</body>

</html>
