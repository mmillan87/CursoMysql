<!DOCTYPE html>
<?php  
	include_once 'conecta.php';
	if(isset($_GET['id_edita'])){
		$consulta_sql = "SELECT * FROM datosUsuarios WHERE idusuario =".$_GET['id_edita'];
		$resultado_consulta = mysqli_query($db_server, $consulta_sql);
		$arreglo_consulta = mysqli_fetch_row($resultado_consulta);
	}
	if(isset($_POST['botonActualizar'])){
		$nombre_update = $_POST['nombre'];
		$apellidos_update = $_POST['apellidos'];
		$ciudad_update = $_POST['ciudad'];
		$update_sql = "UPDATE datosUsuarios SET nombre = '$nombre_update', apellidos = '$apellidos_update', ciudad ='$ciudad_update' WHERE idusuario =" .$_GET['id_edita'];
		if (mysqli_query($db_server, $update_sql)) {
			?>
			<script type="text/javascript">
				alert('Se han actualizado todos los datos exitosamente');
				window.location.href = 'index.php';
			</script>
			<?php
		}
		else {
			?>
			<script type="text/javascript">
				alert('Un error a ocurrido mientras se actualizaban los datos');
				window.location.href = 'index.php';
			</script>
			<?php
		}

		
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar datos - Usuarios Telmex</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css">
</head>
<body>
	<div id="cabecera">
		<div id="contenido">
			<label>Sistema para editar Usuarios</label>
			<label>Editando Datos</label>
		</div>
		<div id="tablita">
			<form method="post">
				<table align="center">
					<tr>
						<td>
							<input type="text" name="nombre" placeholder="Nombre" value="<?php echo $arreglo_consulta[1]; ?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $arreglo_consulta[2]; ?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="ciudad" placeholder="Ciudad" value="<?php echo $arreglo_consulta[3]; ?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<button type="submit" name="botonActualizar"><strong>Actualiza datos</strong></button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>

