<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/korttistyle.css');?>">



<FORM id="korttiForm" action="paivita_kortit" method="POST">

<?php 

?>

<TABLE class="table table-striped table-bordered">
<TR><TH>Etunimi</TH><TH>Sukunimi</TH><TH>Puhelinnumero</TH><TH>Kortti</TH><TH>PIN-koodi</TH></TR>
<?php

// JavaScript -osio pin-koodin muokkausnapille
echo '
	<script type="text/javascript">
	function pinChange(id,key) {
		var clickedButton = document.getElementById(id);
		var saveButton = document.getElementById("pinSaveButton" + key.toString());
		var pinText = document.getElementById("pinChangeText" + key.toString());

		pinText.readOnly = false;
		clickedButton.type = "hidden";
		saveButton.style.visibility = "visible";

	}
	</script>
';

foreach ($kortit as $key => $rivi) {
	echo '<tr>';
	echo '<td>'.$rivi['etunimi'].'</td>';
	echo '<td>'.$rivi['sukunimi'].'</td>';
	echo '<td>'.$rivi['puh'].'</td>';
	
	// Näytetään joko aktiivinen tai deaktiivinen nappi, joka sitten deaktivoi tai aktivoi kortin
	if ($rivi['aktivoitu'] == 1) {
		echo '<td><input type="submit" class="aButton" name="btnDeaktivoi['.$key.']" value=""></td>';
	} else {
		echo '<td><input type="submit" class="dButton" name="btnAktivoi['.$key.']" value=""></td>';
	}

	echo '<td>';

	// Piilotettu tekstilaatikko, joka näytetään kun muokkaa-nappia on painettu
	echo '<input type="text" size="4" maxlength="4" min="4" class="pinChangeText" id="pinChangeText'.$key.'" name="textNewPin['.$key.']" value="'.$rivi['pinkoodi'].'" readonly>';

	// Muokkaa-nappi, laukaisee ylempänä olevan JS-skriptin
	echo '<input type="button" class="pinChangeButton" id="pinChangeButton'.$key.'" value="Muokkaa" onclick="pinChange(this.id,'.$key.')">';
	
	// Tallenna-nappi, näytetään kun muokkaa-nappia on painettu
	echo '<input type="submit" class="pinSaveButton" id="pinSaveButton'.$key.'" name="pinSaveBtn['.$key.']" value="Tallenna"></td>';

	// Piilotettu id-tieto
	echo '<input type="hidden" name="id['.$key.']" value="'.$rivi['id_asiakas'].'">';
	echo '</tr>';

}
?>
</TABLE>
</FORM>