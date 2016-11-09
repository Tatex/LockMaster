<h1>Valitun asiakkaan tilaukset</h1>
<form method="POST" action="etsi_tilaus">
<select class="form-control" style=width:300px  name="valittu_id">
<?php
foreach ($asiakkaat as $rivi) {
	echo '<option value="'.$rivi['id_asiakas'].'">'.
	$rivi['etunimi'].' '.
	$rivi['sukunimi'].'</option>';
}
?>
</select>
<br>
<input class="btn btn-primary" type="submit" name="btnEtsi" value="Etsi"/>
</form>
<br>
<?php
if(isset($tilaus)) {
	print_r($tilaus);
}
?>