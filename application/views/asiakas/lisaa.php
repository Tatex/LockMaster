<?php //Sisällytetään alertbox mukaan ?>
<script type ='text/javascript'
		src = "<?php echo base_url();?>js/alertbox.js">
</script>

<h1>Lisää asiakas</h1>
<form method="POST" action="lisaa">
<label>Etunimi</label> <input type="text" name="en"> <br>
<label>Sukunimi</label> <input type="text" name="sn"> <br>
<label>Email</label> <input type="text" name="em"> <br>
<label>Osoite</label> <input type="text" name="os"> <br>
<label>Puhelinnumero</label> <input type="text" name="puh"> <br><br>

<?php // Haetaan kaikista korteista ne, jotka eivät ole käytössä

	// Muutetaan moniulotteinen kaikkiKortit-taulukko yksiulotteiseksi tmpKaikki-taulukoksi
	foreach($kaikkiKortit as $subArray){
	    foreach($subArray as $val){
	        $tmpKaikki[] = $val;
	    }
	}

	// Muutetaan moniulotteinen kaikkiKortit-taulukko yksiulotteiseksi tmpKaikki-taulukoksi
	foreach($kaytetytKortit as $subArray){
	    foreach($subArray as $val){
	        $tmpKaytetyt[] = $val;
	    }
	}

	// Verrataan taulukkoja ja poistetaan yhteiset tietueet (eli jäljelle jää ne korttien id:t, jotka eivät ole vielä asiakkailla käytössä)
	$vapaatKortit = array_diff($tmpKaikki,$tmpKaytetyt);
?>

<label>Kulkukortti</label>
<?php
if($vapaatKortit > 0) {
	echo '<select name="kortti_id">';
	// Tulostetaan kaikki vapaat kortit
	foreach ($vapaatKortit as $rivi) {
		echo '<option value="'.$rivi.'">'.$rivi.'</option>';
	}
} else {
	echo '<label>Ei vapaita kortteja</label>';
}

echo '</select>';
?>
<br>

<label>Kulkukortin PIN-koodi</label> <br><input size="10px" type="text" name="pin"> <br>
<br>
<input type="submit" name="btnTallenna" value="Tallenna">
</form>


<?php
// Jos success_msg = success (eli jos tietokantamuutos ok)
if($this->session->flashdata('success_msg') == "success") {
	echo '<div class="alert">';
	echo '<span class="alertText">Lisäys ok</span>';
	echo '</div>';
}
?>