<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    
    <div class="form-container">
    <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
    <a href="panel_admin" class="back-button">&larr; Volver</a>
    <div class="input-group">
</div>

        <h2>Agregar Producto</h2>
        <form method="post" action="<?= base_url("/producto/agregar"); ?>" enctype="multipart/form-data">
         <label>Categoría:</label>
    <select name="categoria" required>
    <option value="oferta">Productos en Oferta</option>
    <option value="suplementos">Suplementos</option>
    <option value="gimnasio">Objetos de Gimnasio</option>
    <option value="merchandising">Merchandising</option>
</select>
    <div class="input-group">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
    </div>

    <div class="input-group">
        <label>Precio:</label>
        <input type="text" name="precio" required>
    </div>

    <div class="input-group">
        <label>Stock:</label>
        <input type="number" name="stock" min="0" required>
    </div>

    <div class="input-group">
        <label>Descripcion:</label>
        <textarea name="descripcion" required></textarea>
    </div>

    <div class="input-group">
        <label>Imagen:</label>
        <div class="file-upload">
            <label for="imagen" class="file-upload__label">Selecciona una imagen</label>
            <input type="file" name="imagen" id="imagen" class="file-upload__input">
        </div>
    </div>

    <button type="submit" class="submit-btn">Agregar Producto</button>
</form>

    </div>

    <style>
        /* Estilos CSS */

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            width: 100%;
            max-width: 450px; /* Disminuido el ancho máximo */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h2 {
            margin-bottom: 1rem;
            color: #333;
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #666;
        }

        input,
        textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        .file-upload {
            position: relative;
            display: inline-block;
        }

        .file-upload__label {
            display: block;
            padding: 0.5rem 1rem;
            color: #fff;
            background-color: #007BFF;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .file-upload__input {
            display: none;
        }

        .file-upload__label:hover {
            background-color: #0056b3;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .back-button {
            background-color: red; /* Cambiado a color rojo */
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white; /* Cambiado el color del texto a blanco para mejor contraste con el rojo */
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: darkred; /* Oscurecido el rojo para el hover */
        }

        .input-group select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #f8f8f8;
            appearance: none;
            transition: border-color 0.3s;
        }

        .input-group select:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Flecha descendente personalizada */
        .input-group {
            position: relative;
        }

        .input-group::after {
            content: "\25BC"; /* Código Unicode para flecha hacia abajo */
            font-size: 0.8rem;
            color: #777;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none; /* Esto asegura que no interfiera con el clic en el select */
        }
        /* Estilo para la etiqueta */
label {
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    color: #333;
}

/* Estilo para el selector desplegable */
select {
    width: 100%;
    padding: 10px 15px; /* Ajusta el espacio interno del selector */
    border: 1px solid #ccc; /* Define un borde sutil */
    border-radius: 4px; /* Suaviza las esquinas */
    font-size: 15px; /* Tamaño de letra */
    background-color: #f8f8f8; /* Color de fondo */
    appearance: none; /* Elimina el diseño predeterminado en ciertos navegadores */
    transition: border-color 0.3s ease; /* Transición suave para el color del borde */
}

/* Estilo cuando el selector tiene el foco */
select:focus {
    border-color: #007BFF; /* Cambia el color del borde cuando se selecciona */
    outline: none; /* Elimina el contorno azul por defecto en ciertos navegadores */
}

/* Estilo para las opciones del selector */
option {
    padding: 8px 12px; /* Ajusta el espacio interno de las opciones */
    background-color: #ffffff; /* Fondo blanco para las opciones */
}

/* Al pasar el mouse sobre las opciones */
option:hover {
    background-color: #f2f2f2; /* Cambia el color de fondo al pasar el mouse */
}

    </style>
</body>

</html>
