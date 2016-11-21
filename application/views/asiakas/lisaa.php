<?php //Sisällytetään alertbox mukaan ?>
<script type ='text/javascript'
		src = "<?php echo base_url();?>js/alertbox.js">
</script>

<h1>Lisää asiakas</h1>
<form method="POST" action="lisaa">
<TABLE BORDER=0>
<tr><td>Etunimi</td><td><input type="text" name="en"></td></tr>
<tr><td>Sukunimi</td><td><input type="text" name="sn"></td></tr>
<tr><td>Email</td><td><input type ="text" name="em"></td></tr>
<tr><td>Osoite</td><td><input type="text" name="os"></td></tr>
<tr><td>Puhelinnumero</td><td><input type="text" name="puh"></td></tr>

<!--<label>Etunimi</label> <input type="text" name="en"> <br>
<label>Sukunimi</label> <input type="text" name="sn"> <br>
<label>Email</label> <input type="text" name="em"> <br>
<label>Osoite</label> <input type="text" name="os"> <br>
<label>Puhelinnumero</label> <input type="text" name="puh"> <br><br>-->

<?php // Haetaan kaikista korteista ne, jotka eivät ole käytössä
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
<tr><td>Kulkukortin PIN-koodi</td><td><input size="4" maxlength="4" min="4"  type="text" name="pin"></td></tr> 
<tr><td><input type="submit" name="btnTallenna" value="Tallenna"></td></tr>
<!--<label>Kulkukortin PIN-koodi</label> <br><input size="4" maxlength="4" min="4"  type="text" name="pin"> <br>
<br>
<input type="submit" name="btnTallenna" value="Tallenna">-->
</form>
</TABLE>

<?php
// Jos success_msg = success (eli jos tietokantamuutos ok)
if($this->session->flashdata('success_msg') == "success") {
	echo '<div class="alert">';
	echo '<span class="alertText">Lisäys ok</span>';
	echo '</div>';
}
?>