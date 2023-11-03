<div id="paypal-button-container">

</div>
<script src="https://www.paypal.com/sdk/js?client-id=AUAdq8u-Z7OXMdzHDYgxOG6GxBpQGD8vJxHOn_GgRiTbLNZdQImfjM-TDg_iwRCLdwvRkb63dH77Cxd-&currency=USD"></script>
<script>
    paypal.Buttons({
    style:{
        color:'blue',
        shape: 'pill'
    },
    createOrder: function(data, actions){
        return actions.order.create({
        purchase_units: [{
            amount: {
            value: 100
        }
        }]
    })
    }
}).render('#paypal-button-container');
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efectuar Envio</title>
</head>
<body>
    
</body>
</html>