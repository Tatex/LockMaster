<h2>Muokkaa valitun asiakkaan tiedot</h2>
<FORM action="<?php echo site_url('asiakas/paivita_asiakas');?>" method="POST">
<TABLE class="table table-striped table-bordered">
<TR><TH>Etunimi</TH><TH>Sukunimi</TH><TH>Sähköposti</TH></TR>
<?php

	echo '<tr>';
	echo '<td><input type="text" name="en" value="'.$asiakas[0]['etunimi'].'"></td>';
	echo '<td><input type="text" name="sn" value="'.$asiakas[0]['sukunimi'].'"></td>';
	echo '<td><input type="text" name="email" value="'.$asiakas[0]['email'].'"></td>';
	echo '</tr>';
	echo '<input type="hidden" name="id" value="'.$asiakas[0]['id_asiakas'].'">';

?>
</TABLE>
	<a href="<?php echo site_url('asiakas/listaa');?>" class="btn btn-primary" role="button">Peruuta</a>
	<input class="btn btn-primary" type="submit" name="btnTallenna" value="Tallenna" >
</FORM>