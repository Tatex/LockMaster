<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/korttistyle.css');?>">

<FORM action="paivita_kortit" method="POST">
<TABLE class="table table-striped table-bordered">
<TR><TH>Etunimi</TH><TH>Sukunimi</TH><TH>Puhelinnumero</TH><TH>Kortti</TH><TH>PIN-koodi</TH></TR>
<?php
foreach ($kortit as $key => $rivi) {
	echo '<tr>';
	echo '<td>'.$rivi['etunimi'].'</td>';
	echo '<td>'.$rivi['sukunimi'].'</td>';
	echo '<td>'.$rivi['puh'].'</td>';
	
	if ($rivi['aktivoitu'] == 1) {
		echo '<td><input type="submit" class="dButton" name="btnDeaktivoi['.$key.']" value=""></td>';
	} else {
		echo '<td><input type="submit" class="aButton" name="btnAktivoi['.$key.']" value=""></td>';
	}

	echo '<td>'.$rivi['pinkoodi'].'</td>';
	echo '<input type="hidden" name="id[]" value="'.$rivi['id_asiakas'].'">';
	echo '</tr>';

}
?>
</TABLE>
</FORM>