<?php
  // 1. Connect to database
  $host = "localhost";
  $dbname = "dimayor";
  $username = "root";
  $password = "";
  $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

  $id_equipo= $_REQUEST["id_equipo"];
 
  $sql = "DELETE FROM equipos WHERE  id_equipo='$id_equipo' ";
  
    // 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
    
   // 4. Execute sql sentence
   $result = $q->execute();
   echo "<script>
   alert('Equipo eliminado exitosamente');
           window.location='equipos-liga.php'
         </script>";
?>