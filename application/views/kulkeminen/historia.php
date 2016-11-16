<FORM action="paivita_halytys" method="POST">
<TABLE class="table table-striped table-bordered">
<TR><TH>Päivä</TH><TH>Aika</TH><TH>Kulkija</TH><TH>Oven avaus</TH><TH>PIN syötetty</TH></TR>
<?php
foreach ($kulkemiset as $rivi) {
	echo '<tr>';

	$paivays = DateTime::createFromFormat("Y-m-d", $rivi['pvm']);
	$aika = DateTime::createFromFormat("H:i:s", $rivi['aika']);

	// Format dd.mm.yy muotoon
	echo '<td>'.$paivays->format("d.m.Y").'</td>';

	// Format hh:mm muotoon
	echo '<td>'.$aika->format("H:i").'</td>';
	
	echo '<td>'.$rivi['etunimi'].' '.$rivi['sukunimi'].'</td>';

	if ($rivi['ovi_auki'])
		echo '<td>Kyllä</td>';
	else
		echo '<td>Ei</td>';

	if ($rivi['ilta_kulku'])
		echo '<td>Kyllä</td>';
	else
		echo '<td>Ei</td>';
	
	echo '</tr>';

}
?>
</TABLE>
</FORM>