<?php
$where = '';
$filtro ='';
$nom_fecha = "";
$fecha_partido = "";
$hora_partido="";
$nom_equipo = "";
$id_equipo_local="";
$id_equipo_visit="";
$nom_estadio="";
$id_partido="";
if(isset($_REQUEST['nom_fecha']) || isset($_REQUEST['fecha_partido']) 
|| isset($_REQUEST['hora_partido']) || isset($_REQUEST['id_equipo_local']) 
|| isset($_REQUEST['id_equipo_visit']) || isset($_REQUEST['estadio'])) {

  $filtro= $_REQUEST['filtro'];
  if(isset($_REQUEST['nom_fecha'])) {
    $nom_fecha= $_REQUEST['nom_fecha'];
    if ($nom_fecha != ""){
      $where = "WHERE  calendario.nom_fecha= '$nom_fecha'";
  }
  }
}

if(isset($_REQUEST['fecha_partido'])) {
  $fecha_partido= $_REQUEST['fecha_partido'];
  if ($fecha_partido != ""){
    if ($where == "") {
     $where= "WHERE partido.fecha_partido = '$fecha_partido'"; 
    } else {
    $where = "$where $filtro partido.fecha_partido = '$fecha_partido'";
  }
}
}
if(isset($_REQUEST['hora_partido'])) {
  $hora_partido= $_REQUEST['hora_partido'];
  if ($hora_partido != ""){
    if ($where == "") {
     $where= "WHERE partido.hora_partido= '$hora_partido'"; 
    } else {
    $where = "$where $filtro partido.hora_partido= '$$hora_partido'";
   
  }
}
}
if(isset($_REQUEST['id_equipo_local'])) {
    $id_equipo_local= $_REQUEST['id_equipo_local'];
    if ($id_equipo_local != ""){
      if ($where == "") {
       $where= "WHERE partido.id_equipo_local = '$id_equipo_local'"; 
      } else {
      $where = "$where $filtro partido.id_equipo_local = '$id_equipo_local'";
    }
  }
  }
  if(isset($_REQUEST['id_equipo_visit'])) {
    $id_equipo_visit= $_REQUEST['id_equipo_visit'];
    if ($id_equipo_visit != ""){
      if ($where == "") {
       $where= "WHERE partido.id_equipo_visit = '$id_equipo_visit'"; 
      } else {
      $where = "$where $filtro partido.id_equipo_visit = '$id_equipo_visit'";
    }
  }
  }
  if(isset($_REQUEST['estadio'])) {
    $nom_estadio= $_REQUEST['estadio'];
    if ($nom_estadio != ""){
      if ($where == "") {
       $where= "WHERE estadio.nom_estadio = '$nom_estadio'"; 
      } else {
      $where = "$where $filtro estadio.nom_estadio = '$nom_estadio'";
    }
  }
  }
   // 1. Connect to database
   $host = "localhost";
   $dbname = "dimayor";
   $username = "root";
   $password = "";
   $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

    // 2. Build sql sentence0
  $sql = "SELECT calendario.nom_fecha as nombre_fecha, calendario.id_partido,partido.fecha_partido,
  partido.hora_partido, partido.id_equipo_local, partido.id_equipo_visit, estadio.nom_estadio as estadio
   FROM calendario_partidos calendario JOIN partidos partido ON calendario.id_partido
   =partido.id_partido JOIN equipos equipo ON partido.id_equipo_local=equipo.id_equipo
    JOIN estadios estadio ON equipo.id_estadio=estadio.id_estadio $where
     ORDER BY calendario.id_partido ASC;
  ";

   // 3. Prepare sql sentence
   $q = $cnx-> prepare($sql);
   
  // 4. Execute sql sentence
  $result = $q->execute();
   
  $request = $q-> fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="shortcut icon" type="imgage/x-icon" href="img/Liga.ico">
    <title>CALENDARIO PARTIDOS</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/liga-estilo.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/estilo-index.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/estilo-datos.css'>

    <script src='main.js'></script>
    <header id="main-header">
        <a id="logo-header" href="index.html">
            <img src="img/logo_dimayor.png" width="150px" height="70px">
        </a>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="Torneo-Betplay.html">Torneo Betplay</a></li>
                <li><a href="">Copa Betplay</a></li>
                <li><a href="">Supercopa Betplay</a></li>
                <li><a href="">Liga Betplay Femenina</a></li>


            </ul>
        </nav>
    </header>
</head>

<body background="img/fondo.jpeg ">
    <section id="main-content">
        <div class="content">
            <div class="contenido">

            </div>
            <div>
                <head>
                <h1>CALENDARIO LIGA BETPLAY DIMAYOR</h1>
                </head>
                <center>
                
    <form action= "Calendario-partidos.php">
    <label>Nombre Fecha:</label> 
    <select name="nom_fecha" > 
     <option value =""> Escoge una opción </option>
     <option value ="Fecha 1"<?php if($nom_fecha=="Fecha 1"){echo "selected";}?>>Fecha 1</option>
     <option value ="Fecha 2"<?php if($nom_fecha=="Fecha 2"){echo "selected";}?>>Fecha 2</option>
     <option value ="Fecha 3"<?php if($nom_fecha=="Fecha 3"){echo "selected";}?>>Fecha 3</option>
     <option value ="Fecha 4"<?php if($nom_fecha=="Fecha 4"){echo "selected";}?>>Fecha 4</option>
     <option value ="Fecha 5"<?php if($nom_fecha=="Fecha 5"){echo "selected";}?>>Fecha 5</option>
     <option value ="Fecha 6"<?php if($nom_fecha=="Fecha 6"){echo "selected";}?>>Fecha 6</option>
    </select >
    <label>Estadio :</label> 
    <select name="estadio" > 
     <option value =""> Escoge una opción </option>
     <option value ="Palogrande"<?php if($nom_estadio=="Palogrande"){echo "selected";}?>>Palogrande</option>
     <option value ="Atanasio Girardot"<?php if($nom_estadio=="Atanasio Girardot"){echo "selected";}?>>Atanasio Girardot</option>
     <option value ="Pascual Guerrero"<?php if($nom_estadio=="Pascual Guerrero"){echo "selected";}?>>Pascual Guerrero</option>
     <option value ="Monumental Palmaseca"<?php if($nom_estadio=="Monumental Palmaseca"){echo "selected";}?>>Monumental Palmaseca</option>
    </select >
   </br> <button type = "submit" name ="filtro" value="AND"> Buscar todo </button> 
    <button type = "submit" name ="filtro" value= "OR"> Buscar por filtro </button> <br/>
     </form>
     <hr/>
     <p>Si deseas Adicionar,Actualizar o Eliminar un partido del calendario</p>
                <button onclick="window.location.href='Acciones-calendario.php'">Continuar</button>
      <p>Si deseas saber mas información escoge una opción</p>
                <button onclick="window.location.href='Plantillas.php'">Plantillas</button>
                <button onclick="window.location.href='Partidos.php'">Partidos</button>
                <button onclick="window.location.href='Equipos-liga.php'">Equipos</button>
<hr/> 
     <table class="default">

<tr>
  
  <td>Nombre fecha</td>
  <td>Id partido</td>
  <td>Fecha partido</td>
  <td>Hora partido</td>
  <td>Equipo local</td>
  <td>Equipo Visitante</td>
  <td>Estadio</td>
  
</tr>
<?php
for($i=0;$i<count($request);$i++) {
    ?>
   
        <tr>
        <td> <?php echo $request[$i]["nombre_fecha"]?></td>
        <td> <?php echo $request[$i]["id_partido"]?></td>
        <td> <?php echo $request[$i]["fecha_partido"]?></td>
         <td> <?php echo $request[$i]["hora_partido"]?></td>
         <td> <?php $id_equipo_local = $request[$i]["id_equipo_local"];
         if ($id_equipo_local ==1) {
            echo 'Once caldas';
          }
          else if($id_equipo_local==2) {
            echo 'Atletico nacional';
          }
          else if($id_equipo_local==3) {
              echo 'America de cali';
          }
          else {
            echo 'Independiente medellín';
          }
        ?></td>
        <td> <?php $id_equipo_visit = $request[$i]["id_equipo_visit"];
         if ($id_equipo_visit ==1) {
            echo 'Once caldas';
          }
          else if($id_equipo_visit==2) {
            echo 'Atletico nacional';
          }
          else if($id_equipo_visit==3) {
              echo 'America de cali';
          }
          else {
            echo 'Independiente medellín';
          }
        ?></td>
       <td> <?php echo $request[$i]["estadio"]?></td>
    </tr>
    <?php
}

?>


</table>
    <?php


?>
            </div>
            
        </div>
    </section>
  
</body>
<footer id="main-footer">
        <a href="https://es-la.facebook.com/DimayorOficial"><img class="logos" src="img/facebook.png"
                alt="facebook"></a>
        <a href="https://twitter.com/Dimayor?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img class="logos"
                src="img/twitter.png" alt="twitter"></a>
        <a href="https://www.instagram.com/dimayoroficial/?hl=es-la"><img class="logos" src="img/instagram.png"
                alt="instagram"></a>

        <p>&copy; 2021 <a> DIMAYOR </a></p>

    </footer>
</html>