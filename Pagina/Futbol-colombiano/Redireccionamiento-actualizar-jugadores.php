<?php
$jugador_selec=$_REQUEST["jugador_selec"];
$nom_jugador= $_REQUEST["nom_jugador"];
$fecha_nac= $_REQUEST["fecha_nac"];
$posicion= $_REQUEST["id_posicion"];
$equipos= $_REQUEST["equipos"];
$no_camiseta = $_REQUEST["no_camiseta"];
 // 1. Connect to database
 $host = "localhost";
 $dbname = "dimayor";
 $username = "root";
 $password = "";
 $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

  // 2. Build sql sentence
  $sql = "UPDATE jugadores SET nom_jugador='$nom_jugador',no_camiseta='$no_camiseta'
  ,fec_nac_jugador='$fecha_nac',id_equipo='$equipos',pos_jugador='$posicion'
   WHERE id_jugador='$jugador_selec'";
  // 3. Prepare sql sentence
  $q = $cnx-> prepare($sql);
    
  // 4. Execute sql sentence
  $result = $q->execute();
  echo "<script>
  alert('Jugador actualizado exitosamente');
          window.location='plantillas.php'
        </script>";
?>