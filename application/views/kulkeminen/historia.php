<FORM action="paivita_halytys" method="POST">
<TABLE class="table table-striped table-bordered">
<TR><TH>Päivä</TH><TH>Aika</TH><TH>Oven avaus</TH><TH>PIN syötetty</TH></TR>
<?php
foreach ($kulkemiset as $rivi) {
	echo '<tr>';
	echo '<td>'.$rivi['pvm'].'</td>';
	echo '<td>'.$rivi['aika'].'</td>';
	echo '<td>'.$rivi['ovi_auki'].'</td>';
	echo '<td>'.$rivi['ilta_kulku'].'</td>';
	echo '</tr>';

}
?>
</TABLE>
	<input class="btn btn-primary" type="submit" name="btnTallenna" value="Tallenna" >
	<a href="<?php echo site_url('asiakas/listaa');?>" class="btn btn-primary" role="button">Peruuta</a>
</FORM>