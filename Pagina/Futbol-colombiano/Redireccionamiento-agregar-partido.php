<?php
  
   $fecha_partido= $_REQUEST["fecha_partido"];
   $hora_partido= $_REQUEST["hora_partido"];
   $id_equipo_local= $_REQUEST["id_equipo_local"];
   $id_equipo_visit= $_REQUEST["id_equipo_visit"];
   $nom_partido= $_REQUEST["nom_partido"];

    // 1. Connect to database
    $host = "localhost";
    $dbname = "dimayor";
    $username = "root";
    $password = "";
    $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
 
     // 2. Build sql sentence
   $sql = "INSERT INTO partidos (id_partido,fecha_partido,hora_partido
   ,id_equipo_local,id_equipo_visit,nom_partido)
   VALUES(NULL,'$fecha_partido','$hora_partido','$id_equipo_local'
   ,'$id_equipo_visit','$nom_partido')";

    // 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
    
   // 4. Execute sql sentence
   $result = $q->execute();
   echo "<script>
   alert('Equipo creado exitosamente');
           window.location='Partidos.php'
         </script>";
?>