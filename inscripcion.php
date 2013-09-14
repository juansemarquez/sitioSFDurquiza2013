<?php
require('funciones2.php');
if(!isset($_POST)) die("Error");
if(!isset($_POST['nombre'])||$_POST['nombre']==""||
   !isset($_POST['apellido'])||$_POST['apellido']==""||
   !isset($_POST['curso'])||$_POST['curso']=="0"||
   !isset($_POST['correo'])||$_POST['correo']=="") die("ERROR");
if(!isset($_POST['division'])||$_POST['division']==0) {
    $div=0;
}
else {$div=(int) $_POST['division'];}
if(!isset($_POST['noticias'])) {$not=0;}
elseif($_POST['noticias']=="on") {$not=1;}
else {$not=0;}    

$cantidad=cuantosHay();

if($cantidad>50) {
        $not+=2;
}
$sql="CALL altasfd('".$_POST["nombre"]."','".$_POST["apellido"]."','";
$sql.=$_POST["curso"]."',$div,'".$_POST["correo"]."',$not)";
$con=conectar();
if(mysqli_query($con,$sql)) {
    $cantNueva=$cantidad+1;        
    $mensaje="<h1>Ya somos $cantNueva inscriptos</h1>";
    if($cantidad>50) {
        $mensaje.="<p><span style='color: red;'>La capacidad del auditorio ya ha sido superada.</span><br>";
        $mensaje.="Quedás inscripto/a para la próxima actividad que realizaremos próximamente. ¡Gracias!</p>";
    }
    else {
        
        $mensaje.="<p>Tu inscripción se realizó correctamente.<br>";
        $mensaje.="Nos vemos el jueves a las 18:30hs. ¡Gracias!</p>";
    }
}
else {
    $mensaje="<h1>Error</h1><p>Hubo un error en la inscripción. Intentá más tarde.</p>";
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Día de la Libertad del Software 2013 - Escuela Urquiza</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">Estás usando un navegador <strong>obsoleto</strong>. Si querés, <a href="http://browsehappy.com/">actualizate</a>.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="contenedor">
            <div id="fijo">
                <header>
                    <img src="img/encabezado.png" alt="encabezado">
                    <h1>Día de la Libertad del Software 2013</h1>
                    <h2>Escuela Urquiza - Nivel terciario</h2>
                    <!-- <img src="img/logo-urq.png" alt="Logo Urquiza"> -->               
                </header>
                <nav>
                    <ul>
                        <li><a href="index.html#">Qué es</a></li>
                        <li><a href="index.html#dqst">Actividades</a></li>
                        <li><a href="index.html#actividades">¡Inscribite!</a></li>
                        <li><a href="index.html#inscribite">Difusión</a></li>
                        <li><a href="index.html#difusion">Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <section id="rectangulos">                
                <article id="inscribite">
                    <img src="img/3.png" alt="¡Inscribite!">                    
                    <?php echo $mensaje;?>
                    <p><a href="index.html">Volver</a></p>
                </article>
            </section>
            <footer>
                <p><strong>Algunos derechos reservados</strong>
                - El contenido de esta página está bajo una licencia
                 <a href="http://creativecommons.org/licenses/by-sa/3.0/" target="blank">CC-BY-SA</a>.</p>
            </footer>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>     
    </body>
</html>
