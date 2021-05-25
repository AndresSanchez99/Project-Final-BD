<?php
   // 1. Connect to database
   $host = "localhost";
   $dbname = "dimayor";
   $username = "root";
   $password = "";
   $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

   // 2. Build sql sentence
   $sql = "SELECT id_jugador,nom_jugador FROM jugadores";

   // 3. Prepare sql sentence
	   $q = $cnx-> prepare($sql);
    
	// 4. Execute sql sentence
	   $result = $q->execute();

	$jugadores = $q->fetchAll();
////////////////////////////////////////////////////////
     // 2. Build sql sentence
   $sql = "SELECT id_equipo,nom_equipo FROM equipos";

   // 3. Prepare sql sentence
	   $q = $cnx-> prepare($sql);
    
	// 4. Execute sql sentence
	   $result = $q->execute();

	$equipos = $q->fetchAll();
/////////////////////////////////////////////////////////
    // 2. Build sql sentence
    $sql = "SELECT id_posicion,nom_posicion FROM posiciones";

    // 3. Prepare sql sentence
       $q = $cnx-> prepare($sql);
     
    // 4. Execute sql sentence
       $result = $q->execute();
 
    $posiciones = $q->fetchAll();
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
    <center><head><H1>Ingresar jugador</H1></head>
  
    <FORM action="Redireccionamiento-jugadores.php" method="POST">

    <label>Nombre Completo:</label>
    <input type = "text" name= "nom_jugador" require="required" > <br/>
    <label>No. Camiseta:</label>
    <input type = "number" name= "no_camiseta" require="required" > <br/>
    <label>Fecha nacimiento:</label>
    <input type = "date" name= "fecha_nac" require="required" > <br/>
    <label>Pocisión:</label>
    <select name="id_posicion" required= "required">
					<?php
					for($i=0; $i<count($posiciones); $i++) {
						?>
						<option value="<?php echo $posiciones[$i]['id_posicion'] ?>"> 
						<?php echo $posiciones[$i]['nom_posicion'] ?></option>
						<?php
					}
						?>
                  </select> <br/>
     <label>Nombre Equipo</label> 
      <select name="id_equipo" required= "required">
					<?php
					for($i=0; $i<count($equipos); $i++) {
						?>
						<option value="<?php echo $equipos[$i]['id_equipo'] ?>"> 
						<?php echo $equipos[$i]['nom_equipo'] ?></option>
						<?php
					}
						?>
                  </select> </br>
        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
<hr/>

    <head><H1>Actualizar datos jugador</H1></head>
  
    <FORM action="Redireccionamiento-actualizar-jugadores.php" method="POST">
    <label>Seleccionar jugador</label> 
      <select name="jugador_selec" required= "required">
      <option value=""> Selecciona uno</option> 
					<?php
					for($i=0; $i<count($jugadores); $i++) {
						?>
						<option value="<?php echo $jugadores[$i]['id_jugador'] ?>"> 
						<?php echo $jugadores[$i]['nom_jugador'] ?></option>
						<?php
					}
						?>
        </select> </br>
    <label>Nuevo nombre:</label>
    <input type = "text" name= "nom_jugador" required="required"> <br/>
    <label>No.Camiseta</label>
    <input type = "text" name= "no_camiseta" required= "required"> </br>
    <label>Fecha nacimiento:</label>
    <input type = "date" name= "fecha_nac" required= "required"> <br/>
     <label>Nombre Equipo</label> 
      <select name="equipos" required= "required">
      <option value="">Selecciona un equipo </option> 
					<?php
					for($i=0; $i<count($equipos); $i++) {
						?>
                 
						<option value="<?php echo $equipos[$i]['id_equipo'] ?>"> 
						<?php echo $equipos[$i]['nom_equipo'] ?></option>
						<?php
					}
						?>
        </select> </br>
        <label>Pocisión:</label>
    <select name="id_posicion" required= "required">
    <option>Selecciona una pocisión</option>
					<?php
					for($i=0; $i<count($posiciones); $i++) {
						?>
						<option value="<?php echo $posiciones[$i]['id_posicion'] ?>"> 
						<?php echo $posiciones[$i]['nom_posicion'] ?></option>
						<?php
					}
						?>
                  </select> <br/>
       <br/>  
        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
     </FORM>
     <hr/>

     <h1>Eliminar jugador </h1>
      <FORM action="Redireccionamiento-borrar-jugadores.php" method="POST">

      <label>Seleccionar jugador</label> 
      <select name="jugador_selec" required= "required">
      <option value=""> Selecciona uno</option> 
					<?php
					for($i=0; $i<count($jugadores); $i++) {
						?>
						<option value="<?php echo $jugadores[$i]['id_jugador'] ?>"> 
						<?php echo $jugadores[$i]['nom_jugador'] ?></option>
						<?php
					}
						?>
        </select> </br>
    <label>No.Camiseta:</label>
    <input type = "number" name= "no_camiseta" require="required" > <br/>
     <label>Nombre Equipo</label> 
      <select name="id_equipo" required= "required">
      <option value="">Selecciona un equipo </option> 
					<?php
					for($i=0; $i<count($equipos); $i++) {
						?>
						<option value="<?php echo $equipos[$i]['id_equipo'] ?>"> 
						<?php echo $equipos[$i]['nom_equipo'] ?></option>
						<?php
					}
						?>
                  </select>
        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
    </br>
    <hr/>
    </center>
    <center>
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

