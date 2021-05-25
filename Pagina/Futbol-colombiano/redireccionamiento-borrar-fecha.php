<?php
  // 1. Connect to database
  $host = "localhost";
  $dbname = "dimayor";
  $username = "root";
  $password = "";
  $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);


  $id_partido= $_REQUEST["id_partido"];
  $id_calendario= $_REQUEST["id_calendario"];
 
  $sql = "DELETE FROM calendario_partidos WHERE  id_calendario='$id_calendario'
  AND id_partido='$id_partido'";
  
    // 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
    
   // 4. Execute sql sentence
   $result = $q->execute();
   echo "<script>
   alert('Fecha eliminada exitosamente');
           window.location='calendario-partidos.php'
         </script>";
?>
