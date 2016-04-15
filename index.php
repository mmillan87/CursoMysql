<!DOCTYPE html>
<?php 
	include_once 'conecta.php'; //conecto a mi base de datos
	//condicional para borrar en BD
	if (isset($_GET['id_borra'])) {
		$sql_sent = "DELETE FROM datosUsuarios WHERE idusuario=".$_GET['id_borra']; //un string para enviar a SQL, borramos datos con un id
		mysqli_query($db_server, $sql_sent); //manda consutla por medio ade una variable
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Datos de Telmex</title>
		<script type="text/javascript" href="jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css">
	</head>
	<body>
		<script type="text/javascript">
			function edita_dato(id) {
				if(confirm("Estas seguro de hacer un cambio?")){
					window.location.href = 'editadato.php?id_edita='+id;
				}
			}
			
			function borra_dato(id) {
				if(confirm("Estas seguro de borrar el cambio?")){
					window.location.href = 'index.php?id_borra='+id;
				}
			}
		</script>
		<div id="cabecera">
			<div id="contenido">
				<label>Sistema para registrar Usuarios</label>
			</div>
			<div id="tablita">
				<div id="contenido2">
					<table>
						<tr>
							<th colspan="5">
								<a href="agregadato.php">Agrega Info</a>
							</th>
						</tr>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Ciudad</th>
						<th colspan="2">
							Operaciones
						</th>
						<?php 
							$sql_sentencia = "SELECT * FROM datosUsuarios";
							$resultado_final = mysqli_query($db_server, $sql_sentencia);
							while ($fila = mysqli_fetch_row($resultado_final)){
						?>	
								<tr>
									<td>
										<?php echo "$fila[1]"; ?>
									</td>
									<td>
										<?php echo "$fila[2]"; ?>
									</td>
									<td>
										<?php echo "$fila[3]"; ?>
									</td>
									<td align="center">
										<a href="javascript:edita_dato('
											<?php echo "$fila[0]"; ?>
										')">
											<img src="img/compose-tool-icon.jpg" width="30" height="30">
										</a>
									</td>
									<td align="center">
										<a href="javascript:borra_dato('
											<?php echo "$fila[0]"; ?>
										')">
											<img src="img/Delete_Icon.png" width="30" height="30">
										</a>
									</td>
								</tr>
						<?php
							}
						?>	
					</table>
				</div>
			</div>
		</div>
	</body>
</html>