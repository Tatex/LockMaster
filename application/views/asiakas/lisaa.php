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