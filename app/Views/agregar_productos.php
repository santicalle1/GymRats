<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Productos</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/agregarproductos.css'); ?>">
    <script>
        function showForm() {
            // Esconde todos los formularios
            document.getElementById("ofertaForm").style.display = "none";
            document.getElementById("suplementosForm").style.display = "none";
            document.getElementById("gimnasioForm").style.display = "none";
            document.getElementById("merchandisingForm").style.display = "none";

            // Toma la categoría seleccionada
            var category = document.querySelector("select[name='categoria']").value;

            // Muestra el formulario correspondiente
            switch (category) {
                case "oferta":
                    document.getElementById("ofertaForm").style.display = "block";
                    break;
                case "suplementos":
                    document.getElementById("suplementosForm").style.display = "block";
                    break;
                case "gimnasio":
                    document.getElementById("gimnasioForm").style.display = "block";
                    break;
                case "merchandising":
                    document.getElementById("merchandisingForm").style.display = "block";
                    break;
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector("select[name='categoria']").addEventListener("change", showForm);
        });
    </script>
</head>

<body>
    <div class="form-container">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <a href="panel_admin" class="back-button">&larr; Volver</a>
        <h2>Agregar Producto</h2>
        <form method="post" action="<?= base_url("/producto/agregar"); ?>" enctype="multipart/form-data">
            <label>Categoría:</label>
            <select name="categoria" required>
                <option value="oferta">Productos en Oferta</option>
                <option value="suplementos">Suplementos</option>
                <option value="gimnasio">Objetos de Gimnasio</option>
                <option value="merchandising">Merchandising</option>
            </select>

            <!-- Formulario para Productos en Oferta -->
            <div id="ofertaForm" style="display:none;">
                <!-- Campos específicos para productos en oferta -->
                <div class="input-group">
                    <label>Oferta especial:</label>
                    <input type="text" name="oferta">
                </div>
                <div class="input-group">
                    <label>Descuento (%):</label>
                    <input type="number" name="descuento" min="0" max="100" step="1">
                </div>
            </div>


            <!-- Formulario para Suplementos -->
            <div id="suplementosForm" style="display:none;">
                <!-- Campos específicos para suplementos -->
                <div class="input-group">
                    <label>Tipo de suplemento:</label>
                    <input type="text" name="tipo_suplemento">
                </div>
            </div>

            <!-- Formulario para Objetos de Gimnasio -->
            <div id="gimnasioForm" style="display:none;">
                <!-- Campos específicos para objetos de gimnasio -->
                <div class="input-group">
                    <label>Tamaño:</label>
                    <input type="text" name="tamaño">
                </div>
            </div>

            <!-- Formulario para Merchandising -->
            <div id="merchandisingForm" style="display:none;">
                <!-- Campos específicos para merchandising -->
                <div class="input-group">
                    <label>Marca:</label>
                    <input type="text" name="marca">
                </div>
            </div>

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
</body>

</html>