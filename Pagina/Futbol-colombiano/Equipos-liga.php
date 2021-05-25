<?php
$where = '';
$filtro ='';
$nom_equipo = "";
$ciu_equipo = "";
$titulos_liga_equi="";
$id_estadio="";

if(isset($_REQUEST['nom_equipo']) || isset($_REQUEST['ciu_equipo']) || isset($_REQUEST['titulos_liga_equi'])
|| isset($_REQUEST['id_estadio'])) {

  $filtro= $_REQUEST['filtro'];
  if(isset($_REQUEST['nom_equipo'])) {
    $nom_equipo= $_REQUEST['nom_equipo'];
    if ($nom_equipo != ""){
      $where = "WHERE equipo.nom_equipo = '$nom_equipo'";
  }
  }
}

if(isset($_REQUEST['ciu_equipo'])) {
  $ciu_equipo= $_REQUEST['ciu_equipo'];
  if ($ciu_equipo != ""){
    if ($where == "") {
     $where= "WHERE equipo.ciu_equipo = '$ciu_equipo'"; 
    } else {
    $where = "$where $filtro equipo.ciu_equipo = '$ciu_equipo'";
  }
}
}
if(isset($_REQUEST['titulos_liga_equi'])) {
  $titulos_liga_equi= $_REQUEST['titulos_liga_equi'];
  if ($titulos_liga_equi != ""){
    if ($where == "") {
     $where= "WHERE equipo.titulos_liga_equi= '$titulos_liga_equi'"; 
    } else {
    $where = "$where $filtro equipo.titulos_liga_equi= '$titulos_liga_equi'";
  }
}
}
if(isset($_REQUEST['id_estadio'])) {
    $id_estadio= $_REQUEST['id_estadio'];
    if ($id_estadio != ""){
      if ($where == "") {
       $where= "WHERE equipo.id_estadio = '$id_estadio'"; 
      } else {
      $where = "$where $filtro equipo.id_estadio = '$id_estadio'";
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
  $sql = "SELECT equipo.nom_equipo as nom_equipo, equipo.ciu_equipo as ciu_equipo,
   equipo.titulos_liga_equi as titulos_liga_equi, equipo.id_estadio as id_estadio
   FROM equipos as equipo $where ORDER By equipo.nom_equipo DESC";

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
    <title>EQUIPOS LIGA BETPLAY </title>
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
                <h1>EQUIPOS LIGA</h1>
                </head>
                <center>
                
    <form action= "Equipos-liga.php">
    <label>Nombre Equipo:</label> 
    <input type = "text" name= "nom_equipo" value="<?php echo $nom_equipo; ?>" >
    <label>Ciudad: </label>
    <input type = "text" name= "ciu_equipo" value="<?php echo $ciu_equipo; ?>" >
    <label>Titulos de liga: </label>
    <input type = "number" name= "titulos_liga_equi" value="<?php echo $titulos_liga_equi_equi; ?>" >
    <label>Estadio: </label>
     <select name="id_estadio" > 
     <option value =""> Escoge una opción </option>
     <option value ="1"<?php if($id_estadio=="1"){echo "selected";}?>>Palogrande</option>
     <option value ="2"<?php if($id_estadio=="2"){echo "selected";}?>>Atanasio Girardot</option>
     <option value ="3"<?php if($id_estadio=="3"){echo "selected";}?>>Pascual Guerrero</option>
     <option value ="4"<?php if($id_estadio=="4"){echo "selected";}?>>Monumental Palmaseca</option>
    
    </select> <br/>
    <button type = "submit" name ="filtro" value="AND"> Buscar todo </button> 
    <button type = "submit" name ="filtro" value= "OR"> Buscar por filtro </button> <br/>
     </form>
     <hr/>
    
     <p>Si deseas Adicionar,Actualizar o Eliminar un equipo</p>
                <button onclick="window.location.href='Acciones-equipos.php'">Continuar</button>
<hr/> 
    
     <table class="default">

<tr>

  <td>Nombre equipo</td>
  <td>Ciudad</td>
  <td>Titulos de liga</td>
  <td>Estadio</td>

</tr>
<?php
for($i=0;$i<count($request);$i++) {
    ?>
    <tr>
        <td> <?php echo $request[$i]["nom_equipo"]?></td>
        <td> <?php echo $request[$i]["ciu_equipo"]?></td>
         <td> <?php echo $request[$i]["titulos_liga_equi"]?></td>
         <td> <?php $id_estadio = $request[$i]["id_estadio"];
         if ($id_estadio ==1) {
            echo 'Palogrande';
          }
          else if($id_estadio==2) {
            echo 'Atanasio Girardot';
          }
          else if($id_estadio==3) {
            echo 'Pascual Guerrero';
          } 
          else if($id_estadio==4) {
            echo 'Monumental de Palmaseca';
          }
          else {
            echo 'Estadio nuevo';
          }
        ?></td>
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