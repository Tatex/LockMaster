<!DOCTYPE html>
<html>
<head>
<title>asiakas sivusto</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/bootstrap.min.css');?>">
</head>
<body>

<ul>
	<li><a href="<?php echo site_url('etusivu'); ?>">Etusivu</a></li>
	<li><a href="<?php echo site_url('asiakas/listaa'); ?>">Asiakkaat</a></li>
	<li><a href="<?php echo site_url('asiakas/lisaa'); ?>">Lisää asiakas</a></li>
	<li><a href="<?php echo site_url('asiakas/nayta_poistettavat'); ?>">Poista asiakas</a></li>
	<li><a href="<?php echo site_url('asiakas/nayta_muokattavat_asiakkaat'); ?>">Muokkaa asiakastietoja</a></li>
</ul>