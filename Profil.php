<?php require_once("./nagyreszthtml/DOCKTYPE.html"); ?>

	<link href="./CSS/profil.css" type="text/css" rel="stylesheet">
	<title>Profil | Filmimádók</Title>
</head>

<?php require_once("./php/fejlec.php"); ?>
<?php require_once("./php/leiras.php") ?>

<!-- weblap -->
<div class="felhasznProfil">
	<div class="en">
		<img src="<?php echo $_SESSION['profilkep']?>" width="200" id="profkep" alt="Profilkép">
		<form id="form1">
			<?php
				if($_SESSION['admin']==1)
				{
					echo "<button type='button' id='felfugg'>Felhasználó felfüggesztése</button>";
				}
			?>
			<input class="adatinputok" type="text" name="azonositonev" id="azonositonev" value="<?php echo $_SESSION['felhasznalo_nev']; ?>" readonly><br>
			<label class="cimkek" for="email">E-mail-cím: </label>
			<input class="adatinputok" type="email" name="sajprofemail" id="sajprofemail" value="<?php echo $_SESSION['email_cim']; ?>" readonly><br>
			
			<?php
				if($_SESSION['neme']=="nő" || $_SESSION['neme']=="férfi")
				{
					echo '
					<label class="cimkek" for="neme">Nem: </label>
					<input class="adatinputok" type="text" name="neme" id="neme" value="'.$_SESSION['neme'].'" readonly><br>
					';
				}
				if($_SESSION['orszagaKAPCS']!=NULL)
				{
					echo'
					<label class="cimkek" for="orszag">Nemzetiség: </label>
					<input class="adatinputok" type="text" name="orszag" id="orszag" value="'.$_SESSION['nemzetiseg'].'" readonly><br>
					';
				}
				if($_SESSION['szuletesi_datum']!="0000-00-00")
				{
					echo'
					<label class="cimkek" for="szul">Születési dátum: </label>
					<input class="adatinputok" type="date" name="szul" id="szul" value="'.$_SESSION['szuletesi_datum'].'" readonly><br>
					';
				}
			?>
			<label class="cimkek" for="regdatum">Regisztrálás ideje: </label>
			<input class="adatinputok" type="text" name="regdatum" id="regdatum" value="<?php echo $_SESSION['regisztralas_ideje']; ?>" readonly><br>
		</form>
		<form id="form3" method="post" action="">
			<label id="leirmagamcimke" class="cimkek" for="magamrol">Leírás magamról: </label><br>
			<i class="fa fa-trash leirtorles" title="Törlés"></i>
			<button type="submit" name="submitMagamrol" id="submitMagamrol"><i class="fa fa-save leirment" title="Mentés"></i></button>
			<i class="fa fa-edit leirszerk" title="Szerkesztés"></i>
			<textarea id="leirmagam" class="adatinputok" type="date" name="magamrol" id="magamrol" readonly><?php echo $_SESSION['felhasznalo_leirasa']; ?></textarea><br>
		</form>
		<script>
			leirmagam = document.getElementById("leirmagam");
			leirmagam.addEventListener('input', autoResize, false);
			function autoResize()
			{
				this.style.height = 'auto';
				this.style.height = this.scrollHeight + 'px';
			}
			leirszerk = document.getElementsByClassName("leirszerk");
			leirszerk[0].onclick = function ()
			{
				leirmagam.removeAttribute('readonly');
				vege = leirmagam.value.length;
				leirmagam.setSelectionRange(vege, vege);
				leirmagam.focus();
			}
			leirment = document.getElementsByClassName("leirment");
			leirment[0].onclick = function ()
			{
				leirmagam.readOnly = true;
			}
			leirtorles = document.getElementsByClassName("leirtorles");
			leirtorles[0].onclick = function ()
			{
				leirmagam.value="";
			}
		</script>
		<hr id="profhr">
		<br>
		<form id="form2">
			<label class="cimkek" for="hozz">Hozzászólásaim száma: </label>
			<input class="adatinputok" type="number" name="hozz" id="hozz" value="15" readonly><br><br>
			<label class="cimkek" for="ert">Értékeléseim száma: </label>
			<input class="adatinputok" type="number" name="ert" id="ert" value="53" readonly><br>
		</form>
		<a class="sajatlinkek" id="kedvenclink" href=""><em>Kedvenceim</em></a><br><br>
		<a class="sajatlinkek" href=""><em>Megnézendő filmek</em></a>
	</div>
</div>

<!--Felfuggesztes modal box-->
<div id="myModalFugg" class="modalFugg">
	<!-- Modal content -->
	<div class="modal-contentFugg">
		<span class="closeFugg">&times;</span>
		<div id="divFugg">
			<form>
				<label for="kerdesFugg">A felfüggesztés oka: </label><br><br>
				<textarea name="kerdesFugg" id="kerdesFugg" placeholder = "Itt indokold meg..."></textarea><br><br><br>
				<label for="felfuggIdotartam">A felfüggesztés időtartama: </label>
				<select name="felfuggIdotartam" id="felfuggIdotartam">
					<option>1 hét</option>
					<option>1 hónap</option>
					<option>1 év</option>
				</select><br><br>
				<input type="submit" name="kerdesFuggsb" id="kerdesFuggsb" value="OK"><br>
			</form>
		</div>
	</div>
</div>
<?php
if($_SESSION['admin']==1)
{
	echo'
	<script>
		myModalFugg = document.getElementById("myModalFugg");
		felfugg= document.getElementById("felfugg");
		span = document.getElementsByClassName("closeFugg")[0];

		felfugg.onclick = function()
		{
			myModalFugg.style.display = "block";
		}

		span.onclick = function() {
			myModalFugg.style.display = "none";
		}
		
		window.onclick = function(event) {
		if (event.target == myModalFugg) {
			myModalFugg.style.display = "none";
			}
		}
	</script>
	';
}
?>
<?php require_once("./nagyreszthtml/Footer.html"); ?>