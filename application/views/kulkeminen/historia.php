<FORM action="paivita_halytys" method="POST">
<TABLE class="table table-striped table-bordered">
<TR><TH>Aikaleima</TH><TH>Kulkija</TH><TH>Oven avaus</TH><TH>PIN syötetty</TH></TR>
<?php
foreach ($kulkemiset as $rivi) {
	echo '<tr>';

	$aika = DateTime::createFromFormat( "Y-m-d H:i:s", $rivi['aikaleima']);

	// Format hh:mm muotoon
	echo '<td>'.$aika->format("Y-m-d H:i:s").'</td>';
	
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