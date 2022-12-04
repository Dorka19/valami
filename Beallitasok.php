<?php require_once("./nagyreszthtml/DOCKTYPE.html"); ?>

	<link href="./CSS/beallitasok.css" type="text/css" rel="stylesheet">
	<title>Beállítások | Filmimádók</Title>
</head>

<?php require_once("./php/fejlec.php"); ?>

<!-- weblap -->
<div class="felhasznProfil">
	<div class="en">
		<!--<img src="./Kep/profilkep1.jpg" width="200" id="profkep" alt="Profilkép">
		<form id="form1">
			<input class="adatinputok" type="text" name="azonositonev" id="azonositonev" value="MaciLaci42" readonly><br>
			<label class="cimkek" for="email">E-mail-cím: </label>
			<input class="adatinputok" type="email" name="sajprofemail" id="sajprofemail" value="macilaci42@piknik.hu" readonly><br>
			<label class="cimkek" for="neme">Nem: </label>
			<input class="adatinputok" type="text" name="neme" id="neme" value="férfi" readonly><br>
			<label class="cimkek" for="orszag">Ország: </label>
			<input class="adatinputok" type="text" name="orszag" id="orszag" value="Magyarország" readonly><br>
			<label class="cimkek" for="szul">Születési dátum: </label>
			<input class="adatinputok" type="date" name="szul" id="szul" value="1991-01-08" readonly><br>
			<label class="cimkek" for="regdatum">Regisztrálás dátuma: </label>
			<input class="adatinputok" type="date" name="regdatum" id="regdatum" value="2021-10-21" readonly><br>
		</form>
	-->
		<div class="bealldiv">
			<h1 class="beall">Beállítások</h1>
			<ul class="beallmenu">
				<a href="./nagyreszthtml/Emailvalt.htm" target="bealliframe"><li><i class="fa fa-envelope"></i> E-mail-cím megváltoztatása</li></a>
				<a href="./nagyreszthtml/Jelszovalt.htm" target="bealliframe"><li><i class="fa fa-key"></i> Jelszó megváltoztatása</li></a>
				<a href="./nagyreszthtml/Profilkepvalt.php" target="bealliframe"><li><i class="fa fa-user-circle"></i> Profilkép beállítása</li></a>
				<a href="./nagyreszthtml/Nembeall.htm" target="bealliframe"><li><i class="fa fa-venus-mars"></i> Nem beállítása</li></a>
				<a href="./nagyreszthtml/Nemzetbeall.php" target="bealliframe"><li><i class="fa fa-globe"></i> Nemzetiség beállítása</li></a>
				<a href="./nagyreszthtml/Szulbeall.htm" target="bealliframe"><li><i class="fa fa-calendar"></i> Születési dátum beállítása</li></a>
				<a href="./nagyreszthtml/Felfuggbeall.htm" target="bealliframe"><li><i class="fa fa-stop"></i> Felfüggesztés</li></a>
			</ul>
		</div>
		<div class="fuggovonal2"></div>	
		<div class="iframediv">
			<iframe name="bealliframe" scrolling="no" src="./nagyreszthtml/Emailvalt.htm" height="390" width="390">
			</iframe>
		</div>
	</div>
</div>

<?php require_once("./nagyreszthtml/Footer.html"); ?>