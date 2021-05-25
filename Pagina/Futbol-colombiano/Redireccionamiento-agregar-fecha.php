<?php
  
   $nom_fecha= $_REQUEST["nom_fecha"];
   $id_partido= $_REQUEST["id_partido"];

    // 1. Connect to database
    $host = "localhost";
    $dbname = "dimayor";
    $username = "root";
    $password = "";
    $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
 
     // 2. Build sql sentence
   $sql = "INSERT INTO calendario_partidos (nom_fecha,id_partido)
   VALUES('$nom_fecha','$id_partido')";

    // 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
    
   // 4. Execute sql sentence
   $result = $q->execute();
   echo "<script>
   alert('Fecha creada exitosamente');
           window.location='calendario-partidos.php'
         </script>";
?>
  
  