<?php
   // 1. Connect to database
   $host = "localhost";
   $dbname = "dimayor";
   $username = "root";
   $password = "";
   $cnx = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

   
////////////////////////////////////////////////////////
     // 2. Build sql sentence
   $sql = "SELECT id_equipo,nom_equipo,ciu_equipo,titulos_liga_equi FROM equipos";

   // 3. Prepare sql sentence
	   $q = $cnx-> prepare($sql);
    
	// 4. Execute sql sentence
	   $result = $q->execute();

	$equipos = $q->fetchAll();
   ////////////////////////////////////////
   $sql = "SELECT id_estadio,nom_estadio FROM estadios";

   // 3. Prepare sql sentence
	   $q = $cnx-> prepare($sql);
    
	// 4. Execute sql sentence
	   $result = $q->execute();

	$estadios = $q->fetchAll();
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
    <center><head><H1>Ingresar equipo</H1></head>
  
    <FORM action="Redireccionamiento-agregar-equipo.php" method="POST">

    <label>Nombre Equipo:</label>
    <input type = "text" name= "nom_equipo" require="required" > <br/>
    <label>Ciudad Equipo:</label>
    <input type = "text" name= "ciu_equipo" require="required" > <br/>
    <label>Titulos de liga:</label>
    <input type = "number" name= "titulos_liga_equi" require="required" > <br/>
    <label>Estadio:</label>
    <select name="id_estadio" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($estadios); $i++) {
						?>
						<option value="<?php echo $estadios[$i]['id_estadio'] ?>"> 
						<?php echo $estadios[$i]['nom_estadio'] ?></option>
						<?php
					}
						?>
                        </select>
                        </br>

        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
<hr/>

<head><H1>Actualizar equipo</H1></head>
  
    <FORM action="Redireccionamiento-actualizar-equipo.php" method="POST">
    <label>Seleccionar equipo</label> 
      <select name="id_equipo" required= "required">
      <option value=""> Selecciona uno</option> 
					<?php
					for($i=0; $i<count($equipos); $i++) {
						?>
						<option value="<?php echo $equipos[$i]['id_equipo'] ?>"> 
						<?php echo $equipos[$i]['nom_equipo'] ?></option>
						<?php
					}
						?>
        </select> </br>
    <label>Nuevo nombre Equipo:</label>
    <input type = "text" name= "nom_equipo" require="required" > <br/>
    <label>Ciudad Equipo:</label>
    <input type = "text" name= "ciu_equipo" require="required" > <br/>
    <label>Titulos de liga:</label>
    <input type = "number" name= "titulos_liga_equi" require="required" > <br/>
    <label>Estadio:</label>
    <select name="id_estadio" required= "required">
        <option value=""> </option>
					<?php
					for($i=0; $i<count($estadios); $i++) {
						?>
						<option value="<?php echo $estadios[$i]['id_estadio'] ?>"> 
						<?php echo $estadios[$i]['nom_estadio'] ?></option>
						<?php
					}
						?>
                        </select>
                        </br>

        <br/><INPUT type="submit" value="Enviar Solicitud"> <INPUT type="reset">
        </P>
     </FORM>
<hr/>

<h1>Eliminar equipo </h1>
      <FORM action="redireccionamiento-borrar-equipos.php" method="POST">

    
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

