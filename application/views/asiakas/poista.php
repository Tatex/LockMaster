<h1>Poista asiakas</h1>

<TABLE BORDER=1>
<TR><TH>Etunimi</TH><TH>Sukunimi</TH><TH>Valitse</TH></TR>
<?php

foreach ($asiakkaat as $rivi) {
	echo '<tr><td>'.$rivi['etunimi'].'</td><td>'.$rivi['sukunimi'].'</td><td>';
	echo '<a href="poista/';
	echo $rivi['id_asiakas'].'">Poista</a>';
	echo '</td></tr>';

}

?>

</TABLE>