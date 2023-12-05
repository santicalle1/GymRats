<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

form {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input,
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 16px;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

select {
    margin-bottom: 16px;
}
#borrarFila {
        background-color: red;
        color: white;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        border-radius: 4px;
    }

    #borrarFila:hover {
        background-color: darkred;
    }

    </style>
</head>
<body>
    <form method="post" action="<?= base_url("/panel/armarrutina"); ?>">
        <label for="descripcion">Descripción:</label>
        <table id="rutinaTable">
            <thead>
                <tr>
                    <th>Ejercicio</th>
                    <th>Peso</th>
                    <th>Series</th>
                    <th>Repeticiones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="ejercicio[]" required></td>
                    <td><input type="text" name="peso[]" required></td>
                    <td><input type="text" name="series[]" required></td>
                    <td><input type="text" name="repeticiones[]" required></td>
                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                </tr>
            </tbody>
        </table>
        <button type="button" id="agregarFila">Agregar Fila</button>
        <button type="button" id="borrarFila">Borrar Última Fila</button>
        <label for="dificultad">Dificultad:</label>
        <select name="dificultad" required>
            <option value="facil">Fácil</option>
            <option value="intermedio">Intermedio</option>
            <option value="dificil">Difícil</option>
        </select><br>

        <input type="hidden" name="id_profesor" value="<?= session()->get('id'); ?>">

        <button type="submit">Agregar Rutina</button>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#agregarFila").on("click", function () {
                    // Clona la primera fila y agrega la nueva fila a la tabla
                    var newRow = $("#rutinaTable tbody tr:first").clone();
                    $("#rutinaTable tbody").append(newRow);
                });

                $("#borrarFila").on("click", function () {
                    // Elimina la última fila de la tabla
                    $("#rutinaTable tbody tr:last").remove();
                });
            });
        </script>
    </form>

</body>
</html>
