<h1>Home-modelin data</h1>
<TABLE BORDER=1>
<TR><TH>Etunimi</TH><TH>Sukunimi</TH></TR>	

<?php
foreach ($sisalto as $rivi) {
	echo '<tr><td>'.$rivi['en'].'</td><td>'.$rivi['sn'].'</td></tr>';
}
?>

</TABLE>