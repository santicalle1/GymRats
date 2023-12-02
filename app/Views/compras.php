<!-- compras.php -->
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
    <form id="confirmar-compra-form" action="<?= base_url('procesarCompra') ?>" method="post">
    <div class="form-group">
            <label for="barrio">Barrio:</label>
            <input type="text"  id='barrio' name="barrio">
        </div>

        <div class="form-group">
            <label for="calle">Calle:</label>
            <input type="text" id='calle' name="calle">
        </div>

        <div class="form-group">
            <label for="provincia">Provincia:</label>
            <input type="text" id='provincia' name="provincia">
        </div>

        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" id='ciudad' name="ciudad">
        </div>

        <div class="form-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id='codigo_postal' name="codigo_postal">
        </div>

        <div class="form-group">
            <label for="numero_calle">Número de Calle:</label>
            <input type="text" id='numero_calle' name="numero_calle">
        </div>

        <div class="form-group">
            <label for="descripcion_casa">Descripcion Casa</label>
            <input type="text" id='descripcion_casa' name="descripcion_casa">
        </div>

        <input type="hidden" name="total" value="<?= $TOTAL ?>">

        <div id="paypal-button-container"></div>

    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
            paypal.Buttons({
                style: {
                    shape: 'pill',
                    color: 'blue',
                    layout: 'vertical',
                    label: 'pay',
                },
                createOrder: function(data, actions)  {
    // Obtén los valores de los campos del formulario
    var barrio = document.getElementsByName("barrio")[0].value;
    var calle = document.getElementsByName("calle")[0].value;
    var provincia = document.getElementsByName("provincia")[0].value;
    var ciudad = document.getElementsByName("ciudad")[0].value;
    var codigoPostal = document.getElementsByName("codigo_postal")[0].value;
    var numeroCalle = document.getElementsByName("numero_calle")[0].value;
    var descripcion_casa = document.getElementsByName("descripcion_casa")[0].value;

    // Realiza la validación, puedes agregar más condiciones según tus necesidades
    if (barrio === "" || calle === "" || provincia === "" || ciudad === "" || codigoPostal === "" || numeroCalle === "" || descripcion_casa === "") {
        alert("Por favor, completa todos los campos del formulario.");
        return false; // Evita que se envíe el formulario si no está completo
    } else {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: <?= $TOTAL ?>
                }
            }]
        });
    }
},
            onCancel: function(data) {
                alert('Pago cancelado');
            },
            onApprove: function(data, actions) {
                const form = document.getElementById('confirmar-compra-form');
                form.submit();
            }
        }).render('#paypal-button-container');
    </script>
</body>

</html>
