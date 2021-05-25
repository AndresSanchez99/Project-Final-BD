<?php

$id_calendario= $_REQUEST["nom_fecha"];
$partidos=$_REQUEST["id_partido"];

 // 1. Connect to database
 $host = "localhost";
 $dbname = "dimayor";
 $username = "root";
 $password = "";
 $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

  // 2. Build sql sentence
  $sql = "UPDATE calendario_partidos SET nom_fecha='$id_calendario' WHERE id_partido='$partidos'";
  // 3. Prepare sql sentence
  $q = $cnx-> prepare($sql);
    
  // 4. Execute sql sentence
  $result = $q->execute();
  echo "<script>
  alert('Fecha actualizada exitosamente');
          window.location='calendario-partidos.php'
        </script>";
?>