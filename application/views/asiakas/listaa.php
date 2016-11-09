<h1>Asiakkaat</h1>
<TABLE class="table table-striped table-bordered">
<TR><TH>Etunimi</TH><TH>Sukunimi</TH><TH>Sähköposti</TH><TH>Muokkaa</TR>
<?php
foreach ($asiakkaat as $rivi) {
	echo '<tr><td>'.$rivi['etunimi'].'</td><td>'.$rivi['sukunimi'].'</td><td>'.
	$rivi['email'].'</td>';
	echo '<td><a href="nayta_muokattava_asiakas/'.$rivi['id_asiakas'].'" class="btn btn-primary">Muokkaa</a></td></tr>';
}
?>
</TABLE>