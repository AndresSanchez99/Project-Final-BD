<?php
// 1. Connect to database
   $host = "localhost";
   $dbname = "dimayor";
   $username = "root";
   $password = "";
   $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

    // 2. Build sql sentence0
  $sql = "SELECT Id_partido as id_partido, fecha_partido as fecha_partido,hora_partido,id_equipo_local,
   id_equipo_visit FROM `partidos` WHERE  fecha_partido ";

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
    <title>PARTIDOS LIGA BETPLAY </title>
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
                <h1>PARTIDOS</h1>
                </head>
                <center>
     <table class="default">
      <p>Si deseas Adicionar,Actualizar o Eliminar un partido</p>
                <button onclick="window.location.href='Acciones-partidos.php'">Continuar</button>
<hr/> <tr>
  <td>Id partido</td>
  <td>Fecha partido</td>
  <td>Hora partido</td>
  <td>Equipo local</td>
  <td>Equipo visitante</td>

</tr>
<?php
for($i=0;$i<count($request);$i++) {
    ?>
    <tr>
       <td> <?php echo $request[$i]["id_partido"]?></td>
        <td> <?php echo $request[$i]["fecha_partido"]?></td>
        <td> <?php echo $request[$i]["hora_partido"]?></td>
        <td> <?php $id_equipo_visit = $request[$i]["id_equipo_local"];
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
            echo 'Deportivo cali';
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
            echo 'Deportivo cali';
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