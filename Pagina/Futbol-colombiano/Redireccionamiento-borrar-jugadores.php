<?php
  // 1. Connect to database
  $host = "localhost";
  $dbname = "dimayor";
  $username = "root";
  $password = "";
  $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

  $jugador_selec= $_REQUEST["jugador_selec"];
  $no_camiseta= $_REQUEST["no_camiseta"];
  $id_equipo= $_REQUEST["id_equipo"];
 
  $sql = "DELETE FROM jugadores WHERE id_jugador='$jugador_selec' AND no_camiseta='$no_camiseta'
   AND id_equipo='$id_equipo' ";

    // 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
    
   // 4. Execute sql sentence
   $result = $q->execute();
   echo "<script>
   alert('Jugador eliminado exitosamente');
           window.location='plantillas.php'
         </script>";
?>