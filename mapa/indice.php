<?php
require_once("database.php");
$db = new Database();
$db->query("select distinct(tipo) from locales");
$resultado = $db->rows();
?>
<form method='post' action='mapa.php'>
	Selecciona tipo de local:
	<select name='tipo'>
	<?php
		foreach($resultado as $categoria){
			echo "<option value='".$categoria['tipo']."'>".$categoria['tipo']."</option>";
		}
	?>
	</select>
	<br/>
<?php
$db->query("select distinct(poblacion) from locales");
$resultado = $db->rows();
?>
	Selecciona población:
	<select name='poblacion'>
	<?php
		foreach($resultado as $poblacion){
			echo "<option value='".$poblacion['poblacion']."'>".$poblacion['poblacion']."</option>";
		}
	?>
	</select>
	<br/>
	<input type='submit'/>
</form>
<?php
$db->disconnect();
?>