<?php
   // 1. Connect to database
   $host = "localhost";
   $dbname = "dimayor";
   $username = "root";
   $password = "";
   $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

   
////////////////////////////////////////////////////////
     // 2. Build sql sentence
   $sql = "SELECT id_partido,fecha_partido,hora_partido,
   id_equipo_local,id_equipo_visit,nom_partido FROM partidos";

   // 3. Prepare sql sentence
	   $q = $cnx-> prepare($sql);
    
	// 4. Execute sql sentence
	   $result = $q->execute();

	$partidos = $q->fetchAll();

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
    <center><head><H1>Ingresar nuevo Partido</H1></head>
  
    <FORM action="Redireccionamiento-agregar-partido.php" method="POST">

    <label>Fecha partido:</label>
    <input type = "date" name= "fecha_partido" require="required" > <br/>
    <label>Hora partido:</label>
    <input type = "time" name= "hora_partido" require="required" > <br/>
    <label>Equipo local:</label>
    <select name="id_equipo_local" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($equipos); $i++) {
						?>
						<option value="<?php echo $equipos[$i]['id_equipo'] ?>"> 
						<?php echo $equipos[$i]['nom_equipo'] ?></option>
						<?php
					}
						?>
                        </select> <br/>
    <label>Equipo visitante:</label>                     
    <select name="id_equipo_visit" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($equipos); $i++) {
						?>
						<option value="<?php echo $equipos[$i]['id_equipo'] ?>"> 
						<?php echo $equipos[$i]['nom_equipo'] ?></option>
						<?php
					}
						?>
                        </select>
                        </br>
 <label>Nombre partido:</label> 
  <input type = "text" name= "nom_partido" require="required" > <br/>

        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
<hr/>
<head><H1>Actualizar Partido </H1></head>
  
    <FORM action="Redireccionamiento-actualizar-partido.php" method="POST">
    <label>Seleccionar partido</label> 
      <select name="id_partido" required= "required">
      <option value=""> Selecciona uno</option> 
					<?php
					for($i=0; $i<count($partidos); $i++) {
						?>
						<option value="<?php echo $partidos[$i]['id_partido'] ?>"> 
						<?php echo $partidos[$i]['nom_partido'] ?></option>
						<?php
					}
						?>
       </select>
       <label> <br/>
       Fecha partido:</label>
    <input type = "date" name= "fecha_partido" require="required" > <br/>
    <label>Hora partido:</label>
    <input type = "time" name= "hora_partido" require="required" > <br/>
    <label>Equipo local:</label>
    <select name="id_equipo_local" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($equipos); $i++) {
						?>
						<option value="<?php echo $equipos[$i]['id_equipo'] ?>"> 
						<?php echo $equipos[$i]['nom_equipo'] ?></option>
						<?php
					}
						?>
                        </select> <br/>
    <label>Equipo visitante:</label>                     
    <select name="id_equipo_visit" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($equipos); $i++) {
						?>
						<option value="<?php echo $equipos[$i]['id_equipo'] ?>"> 
						<?php echo $equipos[$i]['nom_equipo'] ?></option>
						<?php
					}
						?>
                        </select> <br/>
    
        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
<hr/>

     <h1>Eliminar partido</h1>
      <FORM action="redireccionamiento-borrar-partidos.php" method="POST">

    
     <label>id_partido</label> 
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
                  </select> <br/>
    <label>Equipo local:</label>
    <select name="id_equipo_local" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($equipos); $i++) {
						?>
						<option value="<?php echo $equipos[$i]['id_equipo'] ?>"> 
						<?php echo $equipos[$i]['nom_equipo'] ?></option>
						<?php
					}
						?>
                        </select> <br/>
        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
    </br>

<hr/>