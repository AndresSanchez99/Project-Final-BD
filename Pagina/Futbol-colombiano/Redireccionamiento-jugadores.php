<?php
  
   $nom_jugador= $_REQUEST["nom_jugador"];
   $no_camiseta= $_REQUEST["no_camiseta"];
   $Fecha_nac= $_REQUEST["Fecha_nac"];
   $equipos= $_REQUEST["id_equipo"];
   $pocision= $_REQUEST["id_posicion"];
   
    // 1. Connect to database
    $host = "localhost";
    $dbname = "dimayor";
    $username = "root";
    $password = "";
    $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
 
     // 2. Build sql sentence
   $sql = "INSERT INTO jugadores (id_jugador,nom_jugador,no_camiseta,fec_nac_jugador,id_equipo,pos_jugador)
   VALUES(NULL,'$nom_jugador','$no_camiseta','$Fecha_nac','$equipos','$pocision')";

    // 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
    
   // 4. Execute sql sentence
   $result = $q->execute();
   echo "<script>
   alert('Jugador creado exitosamente');
           window.location='Plantillas.php'
         </script>";
?>
