<FORM action="paivita_asiakkaat" method="POST">
<TABLE class="table table-striped table-bordered">
<TR><TH>Etunimi</TH><TH>Sukunimi</TH><TH>Sähköposti</TH></TR>
<?php
foreach ($asiakkaat as $rivi) {
	echo '<tr>';
	echo '<td><input type="text" name="en[]" value="'.$rivi['etunimi'].'"></td>';
	echo '<td><input type="text" name="sn[]" value="'.$rivi['sukunimi'].'"></td>';
	echo '<td><input type="text" name="email[]" value="'.$rivi['email'].'"></td>';
	echo '</tr>';
	echo '<input type="hidden" name="id[]" value="'.$rivi['id_asiakas'].'">';
}
?>
</TABLE>
	<a href="<?php echo site_url('asiakas/listaa');?>" class="btn btn-primary" role="button">Peruuta</a>
	<input class="btn btn-primary" type="submit" name="btnTallenna" value="Tallenna" >
</FORM>