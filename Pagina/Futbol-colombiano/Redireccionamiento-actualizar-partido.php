<?php

$fecha_partido= $_REQUEST["fecha_partido"];
$hora_partido= $_REQUEST["hora_partido"];
$id_equipo_local= $_REQUEST["id_equipo_local"];
$id_equipo_visit= $_REQUEST["id_equipo_visit"];


 // 1. Connect to database
 $host = "localhost";
 $dbname = "dimayor";
 $username = "root";
 $password = "";
 $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

  // 2. Build sql sentence
  $sql = "UPDATE partidos SET fecha_partido='$fecha_partido',hora_partido='$hora_partido'
  ,id_equipo_local='$id_equipo_local',id_equipo_visit='$id_equipo_visit'
   WHERE id_equipo_local='$id_equipo_local'" ;
  // 3. Prepare sql sentence
  $q = $cnx-> prepare($sql);
    
  // 4. Execute sql sentence
  $result = $q->execute();
  echo "<script>
  alert('Partido actualizado exitosamente');
          window.location='partidos.php'
        </script>";
?>