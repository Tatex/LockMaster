<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/korttistyle.css');?>">

<FORM id="korttiForm" action="paivita_kortit" method="POST">

<TABLE class="table table-striped table-bordered">
<TR><TH>Etunimi</TH><TH>Sukunimi</TH><TH>Yhteystiedot</TH><TH>Kortti</TH><TH>PIN-koodi</TH></TR>

<?php
foreach ($kortit as $key => $rivi) {
	echo '<tr>';
	echo '<td>'.$rivi['etunimi'].'</td>';
	echo '<td>'.$rivi['sukunimi'].'</td>';

	echo '<td>';
	if ($rivi['email'])
		echo '<div class="contactInfo"><img src="/LockMaster/images/email-icon.png" class="emailIcon">'.$rivi['email'].'</div>';
	if ($rivi['puh'] && $rivi['email'])
		echo '<div class="contactInfo"><img src="/LockMaster/images/phone-icon.png" class="phoneIcon">'.$rivi['puh'].'</div>';
	else if ($rivi['puh'])
		echo '<div class="contactInfo"><img src="/LockMaster/images/phone-icon.png" class="phoneIcon">'.$rivi['puh'].'</div>';

	echo '</td>';
	
	// Näytetään joko aktiivinen tai deaktiivinen nappi, joka sitten deaktivoi tai aktivoi kortin
	if ($rivi['aktivoitu'] == 1) {
		echo '<td><input type="submit" class="aButton" id="korttiBtn'.$key.'" name="btnDeaktivoi['.$key.']" value="">';
	} else {
		echo '<td><input type="submit" class="dButton" id="korttiBtn'.$key.'" name="btnAktivoi['.$key.']" value="">';
	}

	// Korttien valintamenu
	echo '<select class="korttiSelector" id="korttiSelector'.$key.'" name="korttiSelector['.$key.']">';

	if($vapaatKortit > 0) {
		// Tulostetaan kaikki vapaat kortit
		foreach ($vapaatKortit as $row) {
			echo '<option value="'.$row.'">'.$row.'</option>';
		}
	} else {
		echo '<label>Ei vapaita kortteja</label>';
	}
	echo '</select>';

	echo '<span class="cardIdText" id="cardIdText'.$key.'">ID:'.$rivi['id_kortti'].'</span>';

	// Muokkaa-nappi kortin vaihdolle
	echo '<input type="button" class="cardChangeButton" id="cardChangeButton'.$key.'" value="Vaihda" onclick="cardChange(this.id,'.$key.')">';

	// Tallenna-nappi, näytetään kun muokkaa-nappia on painettu
	echo '<input type="submit" class="cardSaveButton" id="cardSaveButton'.$key.'" name="cardSaveBtn['.$key.']" value="Tallenna"></td>';

	echo '</td><td>';

	// Piilotettu tekstilaatikko, joka näytetään kun muokkaa-nappia on painettu
	echo '<input type="text" size="4" maxlength="4" min="4" class="pinChangeText" id="pinChangeText'.$key.'" name="textNewPin['.$key.']" value="'.$rivi['pinkoodi'].'" readonly>';

	// Muokkaa-nappi, laukaisee alempana olevan pinChange JS-skriptin
	echo '<input type="button" class="pinChangeButton" id="pinChangeButton'.$key.'" value="Muokkaa" onclick="pinChange(this.id,'.$key.')">';
	
	// Tallenna-nappi, näytetään kun muokkaa-nappia on painettu
	echo '<input type="submit" class="pinSaveButton" id="pinSaveButton'.$key.'" name="pinSaveBtn['.$key.']" value="Tallenna"></td>';

	// Piilotettu id-tieto
	echo '<input type="hidden" name="id['.$key.']" value="'.$rivi['id_kortti'].'">';
	echo '</tr>';

}
?>
</TABLE>
</FORM>

<?php 
// Jos success_msg = success (eli jos tietokantamuutos ok) 
if($this->session->flashdata('success_msg') == "success") {
	echo '<div class="alert">';
	echo '<span class="alertText">Tallennus ok</span>';
	echo '</div>';
}
?>

<?php // JavaScript -osio korttien valinnan drop-down menulle ?>
<script>
	//Ajetaan sivun latauksen yhteydessä
	document.addEventListener('DOMContentLoaded', function() {
		var cardSelectors = document.getElementsByClassName("korttiSelector");

		for(var i = 0; i < cardSelectors.length; i++) {
			cardSelectors[i].style.display = "none";
		}
	}, false);
</script>

<?php // JavaScript -osio pin-koodin muokkausnapille ?>
<script type="text/javascript">
	function pinChange(id,key) {
		var clickedButton = document.getElementById(id);
		var saveButton = document.getElementById("pinSaveButton" + key.toString());
		var pinText = document.getElementById("pinChangeText" + key.toString());

		pinText.readOnly = false;
		clickedButton.type = "hidden";
		saveButton.style.visibility = "visible";
	}

<?php // JavaScript -osio kortin vaihtonapille ?>
	function cardChange(id,key) {
		var clickedButton = document.getElementById(id);
		var saveButton = document.getElementById("cardSaveButton" + key.toString());
		var korttiButton = document.getElementById("korttiBtn" + key.toString());
		var korttiSelector = document.getElementById("korttiSelector" + key.toString());
		var idText = document.getElementById("cardIdText" + key.toString());

		idText.style.display = "none";
		korttiButton.style.display = "none";
		clickedButton.type = "hidden";
		korttiSelector.style.display = "inline";
		saveButton.style.visibility = "visible";
	}
</script>

<?php //Sisällytetään alertbox mukaan ?>
<script type="text/javascript" 
		src="<?php echo base_url(); ?>js/alertbox.js">
</script>