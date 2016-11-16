<!DOCTYPE html>
<html>
<head>
<title>LockMaster Control Panel</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/bootstrap.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/style.css');?>">
</head>
<body>

<div id="menu">
	<ul>
		<li><a href="<?php echo site_url('etusivu'); ?>">Etusivu</a></li>
		<li><a href="<?php echo site_url('asiakas/lisaa'); ?>">Lisää asiakas</a></li>
		<li><a href="<?php echo site_url('asiakas/nayta_muokattavat_asiakkaat'); ?>">Muokkaa/poista asiakkaita</a></li>
		<li><a href="<?php echo site_url('kortti/nayta_kortit'); ?>">Kulkukortit</a></li>
		<li><a href="<?php echo site_url('kulkeminen/nayta_kulkemiset'); ?>">Kulkuhistoria</a></li>
		<li><a href="<?php echo site_url('etusivu/logout'); ?>">Kirjaudu ulos</a></li>
	</ul>
</div>
<div id="wrapper">