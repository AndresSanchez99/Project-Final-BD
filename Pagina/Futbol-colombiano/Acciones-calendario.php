<?php
   // 1. Connect to database
   $host = "localhost";
   $dbname = "dimayor";
   $username = "root";
   $password = "";
   $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

   
////////////////////////////////////////////////////////
// 2. Build sql sentence
$sql = "SELECT id_calendario, nom_fecha FROM calendario_partidos";

// 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
 
 // 4. Execute sql sentence
    $result = $q->execute();

 $calendario = $q->fetchAll();
////////////////////////////////////////////////////////
 // 2. Build sql sentence
$sql = "SELECT id_partido,id_equipo_local, id_equipo_visit,nom_partido FROM partidos";

// 3. Prepare sql sentence
    $q = $cnx-> prepare($sql);
 
 // 4. Execute sql sentence
    $result = $q->execute();

 $partidos = $q->fetchAll();
  /////////////////////////////////////////////////////
  $sql = "SELECT id_equipo, nom_equipo FROM equipos";

  // 3. Prepare sql sentence
      $q = $cnx-> prepare($sql);
   
   // 4. Execute sql sentence
      $result = $q->execute();

   $equipos = $q->fetchAll();
?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>Adicionar,Actualizar,Eliminar</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/liga-estilo.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/estilo-index.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/estilo-datos.css'>



<body>
    <header id="main-header">
		
		<a id="logo-header" href="#">

		</a>

		<nav>
			<ul>
            <li><a href="index.html">Inicio</a></li>
                <li><a href="Torneo-Betplay.html">Torneo Betplay</a></li>
                <li><a href="">Copa Betplay</a></li>
                <li><a href="">Supercopa Betplay</a></li>
                <li><a href="">Liga Betplay Femenina</a></li>

			</ul>
		</nav>

	</header>
    <center><head><H1>Ingresar partido calendario</H1></head>
  
    <FORM action="Redireccionamiento-agregar-fecha.php" method="POST">

    <label>Nombre Fecha:</label>
    <input type = "text" name= "nom_fecha" require="required" > <br/>
    <label>Partido:</label>
    <select name="id_partido" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($partidos); $i++) {
						?>
						<option value="<?php echo $partidos[$i]['id_partido'] ?>"> 
						<?php echo $partidos[$i]['nom_partido'] ?></option>
						<?php
					}
						?>
                        </select>
                        </br>

        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
<hr/>
<H1>Actualizar calendario partido</H1>
<FORM action="Redireccionamiento-actualizar-fecha.php" method="POST">
  <p>Seleccione el partido al cual quiere cambiar de fecha y eliga la nueva fecha</p>
    <label>Partido:</label>
    <select name="id_partido" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($partidos); $i++) {
						?>
						<option value="<?php echo $partidos[$i]['id_partido'] ?>"> 
						<?php echo $partidos[$i]['nom_partido'] ?></option>
						<?php
					}
						?>
                        </select>
                        </br>        
 <label>Nombre Fecha</label>
<select name="nom_fecha" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($calendario); $i++) {
						?>
						<option value="<?php echo $calendario[$i]['nom_fecha'] ?>"> 
						<?php echo $calendario[$i]['nom_fecha'] ?></option>
						<?php
					}
						?>
                        </select>
                        </br>                            
        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
     <hr/>
<h1>Eliminar partido del calendario</h1>
      <FORM action="redireccionamiento-borrar-fecha.php" method="POST">

    
     <label>Nombre Fecha</label> 
      <select name="id_calendario" required= "required">
      <option value="">Selecciona una fecha </option> 
					<?php
					for($i=0; $i<count($calendario); $i++) {
						?>
						<option value="<?php echo $calendario[$i]['id_calendario'] ?>"> 
						<?php echo $calendario[$i]['nom_fecha'] ?></option>
						<?php
					}
						?>
                  </select> <br/>
    <label>Nombre Partido</label> 
      <select name="id_partido" required= "required">
      <option value="">Selecciona un partido </option> 
					<?php
					for($i=0; $i<count($partidos); $i++) {
						?>
						<option value="<?php echo $partidos[$i]['id_partido'] ?>"> 
						<?php echo $partidos[$i]['nom_partido'] ?></option>
						<?php
					}
						?>
                  </select>
                  
        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
    </br>
    <hr/>

   
   <p> <input type="button" onclick="history.back()" name="volver atrás" value="Volver atrás"></p>
    </center>
    <footer id="main-footer">
        <a href="https://es-la.facebook.com/DimayorOficial"><img class="logos" src="img/facebook.png"
                alt="facebook"></a>
        <a href="https://twitter.com/Dimayor?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img class="logos"
                src="img/twitter.png" alt="twitter"></a>
        <a href="https://www.instagram.com/dimayoroficial/?hl=es-la"><img class="logos" src="img/instagram.png"
                alt="instagram"></a>

        <p>&copy; 2021 <a> DIMAYOR </a></p>

    </footer>

</body>

</html>

