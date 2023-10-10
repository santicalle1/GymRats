<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <style>
        *{

margin: 0;
padding: 0;
box-sizing: border-box;

}


.header{
padding: 15px 30px;
background-color: darkcyan;
display: flex;
justify-content: space-between;
align-items: center;
}


.header h2{
 font-size: 20px;

}


.side-bar-left {
width: 250px;
min-height: 200vh;
transition: 500ms width;
background-color: darkslategrey;
}


#navbar {
display: inline-block;
margin-left: 1000px;
transition: 200ms color;
color: white;

}


.user-p .perfil {
width: 50%;
border-radius: 50%;

}


.user-p {

text-align: center;
padding-left: 15px;
padding-top: 17px;


}


.side-bar-left ul {
margin-left: 15px;
list-style: none;
}

.side-bar-left ul li {
padding-left: 15px;
padding:15px;
text-overflow: ellipsis;
transition: 500ms background;
white-space: nowrap;
overflow: hidden;
}


.side-bar-left ul li a {

color: white;
text-decoration: none;

}


.side-bar-left ul li:hover {
background-color: orangered;

}

.side-bar-left ul li a i {

display: inline-block;
padding: 15px;
cursor: pointer;
color: orange;

}



.u-name {
padding-left: 15px;
color: white;
}



.u-name b {
color: greenyellow;
padding: 10px;


}

#checkbox{

display: none;

}

#checkbox:checked ~ .body .side-bar-left {
width: 100px;


}

#checkbox:checked ~ .body .side-bar-left .user-p {
visibility: hidden;
    
    
    }

    #checkbox:checked ~ .body .side-bar-left a span {
        display: none;
            
            
            }

            .body {

display:flex;

            }
.section-1{

width: 100%;
display: flexbox;
justify-content: center;
align-items: center;
flex-direction: column;


}

.paginacion{
border: 1px solid darkred;
background-color: black;
padding: 10px;
color: white;
display: inline-block;
text-decoration: none;
opacity:0.8;

}

.paginacion:hover {
opacity:1;

}

    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <title>Pagina de panel de Admistrador</title>
</head>
<body>


    <!-----Casilla de verificacion-->
    <input type="checkbox" id="checkbox">
    <!----Inicio del Encabezado-->
    <header class="header">
    <h2 class="u-name">GymRats<b>Panel</b>
    <label for="checkbox">
    <!---Iconos de Aplicaciones Font-Awesome-->
    

    </label>
    </h2>
    </header>
    <!----Fin del Encabezado----->

<!----Agregue una tabla a un documento---->
    <div class="body">
<!--- Barra lateral Izquierda---------->
    <nav class="side-bar-left">


    <ul>
<!------Dashboard-->


    <li>
<a href="items_view">
<i class="fa fa-dashboard"></i>
<span>Ver Perfiles</span>

</a>
    </li>

<!----------Configuracion---->

<li>
    <a href="<?= base_url('agregar_productos') ?>">
        <i class="fa fa-cog"></i>
        <span>Agregar Productos</span>
    </a>
</li>


<!----------table---->

<!-- <li>
    <a href="table.php">
    <i class="fa fa-table"></i>
    <span>Tabla</span>
    
    </a>
        </li> -->

        <!----------Salir---->

    <li>
        <a href="inicio">
        <i class="fa fa-power-off"></i>
        <span>Salir</span>
        
        </a>
            </li>


    </ul>
    
    </nav>
    <div class="body">
    <!-- Resto de tu código -->

    <!-- Aquí comienza el contenido dinámico centrado -->
    <h1>
        Ideas para poner mas adelante en esta parte; profesores,stock, detalles y ventas disponibles
    </h1>
    <!-- Resto de tu código -->
</div>

    </div> 
</div>

</body>
</html>

 
</body>
</html>
