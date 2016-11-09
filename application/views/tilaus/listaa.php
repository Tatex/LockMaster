<h1>Tilaukset</h1>
<TABLE class="table table-striped table-bordered">
<TR><TH>Etunimi</TH><TH>Sukunimi</TH><TH>Tuote</TH></TR>
<?php
	foreach ($tilaukset as $rivi) {
		echo '<tr><td>'.$rivi['etunimi'].'</td><td>'.$rivi['sukunimi'].'</td><td>'.$rivi['tuote'].'</td></tr>';
	}
?>
</TABLE>