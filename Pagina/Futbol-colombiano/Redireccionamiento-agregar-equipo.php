<?php
  
   $nom_equipo= $_REQUEST["nom_equipo"];
   $ciu_equipo= $_REQUEST["ciu_equipo"];
   $titulos_liga_equi= $_REQUEST["titulos_liga_equi"];
   $id_estadio= $_REQUEST["id_estadio"];

    // 1. Connect to database
    $host = "localhost";
    $dbname = "dimayor";
    $username = "root";
    $password = "";
    $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
 
     // 2. Build sql sentence
   $sql = "INSERT INTO equipos (id_equipo,nom_equipo,ciu_equipo,titulos_liga_equi,id_estadio)
   VALUES(NULL,'$nom_equipo','$ciu_equipo','$titulos_liga_equi','$id_estadio')";

    // 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
    
   // 4. Execute sql sentence
   $result = $q->execute();
   echo "<script>
   alert('Equipo creado exitosamente');
           window.location='Equipos-liga.php'
         </script>";
?>