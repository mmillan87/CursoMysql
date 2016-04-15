<!DOCTYPE html>
<?php 
	include_once 'conecta.php';
	if(isset($_POST['boton-envia'])){
		//valores para agregar a la BD
		$nombre = $_POST['_nombre'];
		$apellidos = $_POST['_apellidos'];
		$localidad = $_POST['_lugar'];

		//comandos para sql
		$sentencia_sql = "INSERT INTO datosUsuarios (nombre, apellidos, ciudad) VALUES ('$nombre', '$apellidos', '$localidad')";
		//insertando la funcion de sql
		if (mysqli_query($db_server, $sentencia_sql)) {
			?>
			<script type="text/javascript">
				alert('Se han insertado todos los datos exitosamente');
				window.location.href = 'index.php';
			</script>
			<?php
		}
		else {
			?>
			<script type="text/javascript">
				alert('Un error a ocurrido mientras se insertaban los datos');
				window.location.href = 'index.php';
			</script>
			<?php
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Datos de Telmex</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css">
</head>
<body>
	<div id="cabecera">
		<div id="contenido">
			<label>Sistema para registrar Usuarios</label>
			<label>Agregando Datos</label>
		</div>
		<form method="post">
			<table align="center">
				<tr>
					<td align="center">
						<a href="index.php">Regresa menú principal</a>
					</td>
					<tr>
						<td>
							<input type="text" name="_nombre" placeholder="Escribe tu nombre" required="true">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="_apellidos" placeholder="Escribe tus apellidos" required="true">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="_lugar" placeholder="Escribe tu lugar de procedencia" required="true">
						</td>
					</tr>
					<tr>
						<td>
							
							<button type="submit" name="boton-envia" >Guarda datos</button>
						</td>
					</tr>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>