<?php
$where = '';
$filtro ='';
$nom_jugador = "";
$nom_equipo = "";
$pos_jugador="";

if(isset($_REQUEST['nom_jugador']) || isset($_REQUEST['nom_equipo']) 
|| isset($_REQUEST['pos_jugador'])) {

  $filtro= $_REQUEST['filtro'];
  if(isset($_REQUEST['nom_jugador'])) {
    $nom_jugador= $_REQUEST['nom_jugador'];
    if ($nom_jugador != ""){
      $where = "WHERE jugador.nom_jugador = '$nom_jugador'";
  }
  }
}

if(isset($_REQUEST['nom_equipo'])) {
  $nom_equipo= $_REQUEST['nom_equipo'];
  if ($nom_equipo != ""){
    if ($where == "") {
     $where= "WHERE  equipos.nom_equipo = '$nom_equipo'"; 
    } else {
    $where = "$where $filtro  equipos.nom_equipo= '$nom_equipo'";
  }
}
}
if(isset($_REQUEST['pos_jugador'])) {
  $pos_jugador= $_REQUEST['pos_jugador'];
  if ($pos_jugador != ""){
    if ($where == "") {
     $where= "WHERE jugador.pos_jugador= '$pos_jugador'"; 
    } else {
    $where = "$where $filtro jugador.pos_jugador= '$pos_jugador'";
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
  $sql = "SELECT jugador.nom_jugador as nom_jugador, jugador.pos_jugador as pos_jugador,
   jugador.id_equipo as id_equipo, jugador.no_camiseta, jugador.fec_nac_jugador, 
   equipos.nom_equipo FROM jugadores as jugador JOIN equipos ON equipos.id_equipo=
   jugador.id_equipo ORDER By equipos.nom_equipo, jugador.pos_jugador ASC ";

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
    <title>PLANTILLAS LIGA BETPLAY </title>
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
                <center>
                <h1>PLANTILLAS</h1>
                <p>Aquí puedes buscar la plantilla de cada uno de los equipos de la liga</p>
                </head>
    <form action= "Plantillas.php">
    <label>Nombre Jugador:</label> 
    <input type = "text" name= "nom_jugador" value="<?php echo $nom_jugador; ?>" >
    <label>Equipo: </label>
    <input type = "text" name= "nom_equipo" value="<?php echo $nom_equipo; ?>" >
    <label>Posición Jugador: </label>
     <select name="pos_jugador" > 
     <option value =""> Escoge una opción </option>
     <option value ="1"<?php if($pos_jugador=="1"){echo "selected";}?>>Portero</option>
     <option value ="2"<?php if($pos_jugador=="2"){echo "selected";}?>>Defensa central</option>
     <option value ="3"<?php if($pos_jugador=="3"){echo "selected";}?>>Lateral</option>
     <option value ="4"<?php if($pos_jugador=="4"){echo "selected";}?>>Mediocampista defensivo</option>
     <option value ="5"<?php if($pos_jugador=="4"){echo "selected";}?>>Mediocampista</option>
     <option value ="6"<?php if($pos_jugador=="4"){echo "selected";}?>>Mediocampista ofensivo</option>
     <option value ="7"<?php if($pos_jugador=="4"){echo "selected";}?>>Delantero centro</option>
     <option value ="8"<?php if($pos_jugador=="4"){echo "selected";}?>>Extremo</option>
    </select> <br/>
    <button type = "submit" name ="filtro" value="AND"> Buscar todo </button> 
    <button type = "submit" name ="filtro" value= "OR"> Buscar por filtro </button> <br/>
     </form>
    
     </hr>
                Si deseas Adicionar,Actualizar o Eliminar un jugador
                <button onclick="window.location.href='Acciones-jugadores.php'">Continuar</button>
     </center>

     <center>
     <table class="default">

<tr>

  <td>Nombre</td>
  <td>Fecha Nacimiento</td>
  <td>Posición </td>
  <td>Numero Camiseta</td>
  <td>Equipo</td>

</tr>
<?php
for($i=0;$i<count($request);$i++) {
  ?>
  <tr>
      <td> <?php echo $request[$i]["nom_jugador"]?></td>
      <td> <?php echo $request[$i]["fec_nac_jugador"]?></td>
       <td> <?php $pos_jugador = $request[$i]["pos_jugador"];
       if ($pos_jugador ==1) {
          echo 'Portero';
        }
        else if($pos_jugador==2) {
          echo 'Defensa central';
        }
        else if($pos_jugador==3) {
          echo 'Lateral';
        } 
        else if($pos_jugador==4) {
          echo 'Mediocampista defensivo';
        }
        else if($pos_jugador==5) {
          echo 'Mediocampista';
        }
        else if($pos_jugador==6) {
          echo 'Mediocampista ofensivo';
        }
        else if($pos_jugador==7) {
          echo 'Delantero centro';
        }
        else {
          echo 'Extremo';
        }
      ?></td>
       <td> <?php echo $request[$i]["no_camiseta"]?></td>
       <td> <?php echo $request[$i]["nom_equipo"]?></td>
       
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
    <footer id="main-footer">
        <a href="https://es-la.facebook.com/DimayorOficial"><img class="logos" src="img/facebook.png"
                alt="facebook"></a>
        <a href="https://twitter.com/Dimayor?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img class="logos"
                src="img/twitter.png" alt="twitter"></a>
        <a href="https://www.instagram.com/dimayoroficial/?hl=es-la"><img class="logos" src="img/instagram.png"
                alt="instagram"></a>

        <p>&copy; 2021 <a> DIMAYOR </a></p>

    </footer>
</body>

</html>