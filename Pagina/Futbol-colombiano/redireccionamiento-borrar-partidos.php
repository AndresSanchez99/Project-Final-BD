<?php
  // 1. Connect to database
  $host = "localhost";
  $dbname = "dimayor";
  $username = "root";
  $password = "";
  $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

  $id_partido= $_REQUEST["id_partido"];
  $id_equipo_local= $_REQUEST["id_equipo_local"];
 
  $sql = "DELETE FROM partidos WHERE  id_partido='$id_partido' AND id_equipo_local='$id_equipo_local'";
    // 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
    
   // 4. Execute sql sentence
   $result = $q->execute();

   echo "<script>
   alert('Partido eliminado exitosamente');
           window.location='partidos.php'
         </script>";
?>