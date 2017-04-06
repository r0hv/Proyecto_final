<?php
session_start();
if(!isset($_SESSION['usuario'])){
 echo "<script>location.href='../index.html'</script>";
}
?>

<?php

include_once 'config3.php';

?>


<?php
include_once 'config3.php';


if(isset($_POST['btn-save']))
{
 include_once 'db/login.inc.php';

       $id = $_GET['id_ciu_goh'];
    $ftipo = $_POST['nomb_ciu_goh'];
   
    




    
    if($crud->create($ftipo))
    {   
        

        header("Location: add-ciudades.php?inserted");
    }
    else
    {
        header("Location: add-ciudades.php?failure");
    }
}
?>

<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ArtandShops.info</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                 <li>
                        <a href="carrito2/index.php"><div>Carrito de Compras</div></a>
                    </li> 
                    
                    <li>
                        <a href="Reportesclientes.php"><div>Reportes</div></a>
                    </li>    
                    
                    
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">CRUDS<b class="caret"></b></a>
                        <ul class="dropdown-menu">|
                            <li>
                                <a href="clientes1.php">Clientes</a>
                            </li>
                            <li>
                                <a href="ciudades.php">Ciudades</a>
                            </li>
                            <li>
                                <a href="productos.php">Productos</a>
                            </li>
                             <li>
                                <a href="usuarios.php">Usuarios</a>
                            </li>
                              <li>
                                <a href="detalles.php">Detalles</a>
                            </li>
                            <li>
                                <a href="promociones.php">Promociones</a>
                            </li>
                            <li>
                                <a href="categorias.php">Categorias</a>
                            </li>
                            <li>
                                <a href="facturas.php">Facturas</a>
                            </li>
                            <li>
                                <a href="contactos.php">Contactos</a>
                            </li>
                        </ul>
                    </li>       
                        
                    
                     <li>
                        <a href="logout.php"><div>Salir</div></a>
                    </li>
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

    <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nueva Ciudad</h1>

<?php
if(isset($_GET['inserted']))
{
    ?>
    <div class="container">
    <div class="alert alert-info">
    <strong>Excelente!</strong> El registro se guardo exitosamente!! <a href="ciudades.php"> Regresar</a>! <?php echo $usuario; ?>
    </div>
    </div>
    <?php
}
else if(isset($_GET['failure']))
{
    ?>
    <div class="container">
    <div class="alert alert-warning">
    <strong>Lo sentimos!</strong> Error al guardar registro!
    </div>
    </div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">

    
     <form method='post'>
 
    <table class='table table-bordered'>
    <form action="a" method="a" id="a" name="a" onsubmit="return validacion()">




    <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false 
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
             alert('No se permiten numeros en este campo');
            return false;
        }
    }
</script>
<script>
function CheckUserName(ele) {
if (/\s/.test(ele.value)) { alert("no se permiten espacios en blanco"); }
}
</script>

 







<tr>
            <td><b>Ciudad</td>
            <td><input onkeypress="return soloLetras(event)" type='text' name='nomb_ciu_goh' id='nomb_ciu_goh'class='form-control' required   onBlur="CheckUserName(this);" ></td>
        </tr>





       
 
  

   
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save" id="centro3">
            <span class="glyphicon glyphicon-plus"></span> Agregar
            </button>  
            <a href="ciudades.php" class="btn btn-large btn-success" id="centro3"><i class="glyphicon glyphicon-backward"></i> &nbsp; Regresar</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

        <p class="footer">Copyright &copy; Artandshops.info Todos los Derechos Reservados 2016</p>
      </footer>
 
    </div> <!-- /container -->
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
