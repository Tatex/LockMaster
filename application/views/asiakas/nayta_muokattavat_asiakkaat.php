<FORM action="paivita_asiakkaat" method="POST">
<TABLE class="table table-striped table-bordered">
<TR><TH>Etunimi</TH><TH>Sukunimi</TH><TH>Sähköposti</TH><TH>Osoite</TH><TH>Puhelinnumero</TH></TR>
<?php
foreach ($asiakkaat as $rivi) {
	echo '<tr>';
	echo '<td><input size="10px" type="text" name="en[]" value="'.$rivi['etunimi'].'"></td>';
	echo '<td><input size="15px "type="text" name="sn[]" value="'.$rivi['sukunimi'].'"></td>';
	echo '<td><input type="text" name="email[]" value="'.$rivi['email'].'"></td>';
	echo '<td><input type="text" name="os[]" value="'.$rivi['osoite'].'"></td>';
	echo '<td><input type="text" name="puh[]" value="'.$rivi['puh'].'"></td>';

	echo '<td><a href="poista/';
	echo $rivi['id_asiakas'].'">Poista asiakas</a></td>';
	
	echo '<input type="hidden" name="id[]" value="'.$rivi['id_asiakas'].'">';
	echo '</tr>';

}
?>
</TABLE>
	<input class="btn btn-primary" type="submit" name="btnTallenna" value="Tallenna" >
	<a href="<?php echo site_url('asiakas/listaa');?>" class="btn btn-primary" role="button">Peruuta</a>
</FORM>