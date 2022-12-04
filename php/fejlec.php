<?php session_start(); ?>
<?php require_once('./php/bejmukodes.php'); ?>
<body>
<?php
if(!isset($_SESSION['felhasznaloID']))
{
echo'
	<div class="topnav">
		<a class="logo" href="./Filmimadok.php"><img class="logokep" src="./Webkep/filmimadok3.png" alt="Filmimádók" width="200" height="40"></a>
		<a id="logo"><img src="./Webkep/filmimadok3.png" alt="Filmimádók" width="200" height="40"><i class="fa fa-caret-down nyil" id="nyil1"></i></a>
		<div id="lenyilomenu">
			<a class="navgomb2" href="./Filmimadok.php">Főoldalra</a>
			<a class="navgomb2" href="./Filmek.php ">Filmek</a>
			<a class="navgomb2" href="./Szineszek.php ">Színészek</a>
			<a class="navgomb2" href="./Rendezok.php">Rendezők</a>
			<a class="navgomb2" href="./Kozosseg.php">Közösség</a>
		</div>
		<script>
			logo = document.getElementById("logo");
			lenyilomenu = document.getElementById("lenyilomenu");
			nyil1 = document.getElementById("nyil1");
			logo.onclick = function()
			{
				if(lenyilomenu.style.display == "none")
				{
					lenyilomenu.style.display = "block";
					nyil1.style.transform = "rotate(180deg)";
				}
				else
				{
					lenyilomenu.style.display = "none";
					nyil1.style.transform = "rotate(0deg)";
				};
			}

			document.addEventListener("click", (event) => {
				const isClickInside = lenyilomenu.contains(event.target);
				const isClickInside2 = logo.contains(event.target);
				if (!isClickInside &&  !isClickInside2) {

					lenyilomenu.style.display = "none";
					nyil1.style.transform = "rotate(0deg)";
				}
			});
		</script>

		<div id="fejleckozep">
			<a class="navgomb" href="./Filmek.php ">Filmek</a>
			<a class="navgomb" href="./Szineszek.php ">Színészek</a>
			<a class="navgomb" href="./Rendezok.php">Rendezők</a>
			<a class="navgomb" href="./Kozosseg.php">Közösség</a>
		</div>

		<div id="fejlecjobb" >
			<div class="dropdown">
				<button id="reglogbtn" class="dropbtn">
					Bejelentkezés / Regisztráció 
					<i class="fa fa-caret-down nyil" id="nyil2"></i>
				</button>
				<div id="myDropdown" class="dropdown-content" >
					<div class="container0">Személyes fiók</div>
					<form action="" method="post">
						<div class="imgcontainer">
							<img src="./Webkep/profilkep.jpg" alt="Avatar" class="avatar">
						</div>
						<div class="container1">
							<label for="uname">Felhasználónév</label>
							<input type="text" placeholder="Írd ide a felhasználóneved" name="uname" required id="unameLogin" value="';
							if(isset($_COOKIE["uname"])) { echo $_COOKIE["uname"]; }
							echo'">
							<label for="psw">Jelszó</label>
							<input type="password" placeholder="Írd ide a jelszavadat" name="psw" required id="pswLogin" value="';
							if(isset($_COOKIE["psw"])) { echo $_COOKIE["psw"]; }
							echo'">
							<input type="checkbox" name="remember">
							<label id="emlekezz">Emlékezz rám</label>
							<button class="bejelentkez" type="submit" name="submit">Bejelentkezés</button>
						</div>
						<div class="container2">
							<a id="jelszoemlekezteto">Jelszóemlékeztető</a>
							<a id="reg" href="./Regisztracio.php">Regisztráció</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
			reglogbtn = document.getElementById("reglogbtn");
			myDropdown = document.getElementById("myDropdown");
			nyil2 = document.getElementById("nyil2");

			reglogbtn.onclick = function()
			{
				if(myDropdown.style.display == "none")
				{
				myDropdown.style.display = "block";
				nyil2.style.transform = "rotate(180deg)";
				}
				else
				{
				myDropdown.style.display = "none";
				nyil2.style.transform = "rotate(0deg)";
				};
			}

			document.addEventListener("click", (event) => {
				const isClickInside = myDropdown.contains(event.target);
				const isClickInside2 = reglogbtn.contains(event.target);
				if (!isClickInside &&  !isClickInside2) {
					myDropdown.style.display = "none";
					nyil2.style.transform = "rotate(0deg)";
				}
				});
		</script>

		<div id="myModal" class="modal">

			<div class="modal-content">
			<span class="close">&times;</span>
			<div id="jelszemDiv">
				<label for="jelszem">Add meg az <em>e-mail-címedet</em>, amivel <em>regisztráltál: </em></label><br><br>
				<input type="email" name="jelszem" id="jelszem" placeholder="E-mail-címed"><br>
			</div>
			</div>
		</div>

		<script>
			modal = document.getElementById("myModal");
			jelszoemlekezteto= document.getElementById("jelszoemlekezteto");
			span = document.getElementsByClassName("close")[0];
			myDropdown = document.getElementById("myDropdown");
			nyil2 = document.getElementById("nyil2");

			jelszoemlekezteto.onclick = function()
			{
				modal.style.display = "block";
				myDropdown.style.display = "none";
				nyil2.style.transform = "rotate(0deg)";
			}

			span.onclick = function() {
			modal.style.display = "none";
			}
			
			window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
				}
			}
		</script>
	</div><div id="topmargo"></div>
	';
}
else
{

	echo'	
<div class="topnav">
		<a class="logo" href="./Filmimadok.php"><img class="logokep" src="./Webkep/filmimadok3.png" alt="Filmimádók" width="200" height="40"></a>
		<a id="logo"><img src="./Webkep/filmimadok3.png" alt="Filmimádók" width="200" height="40"><i class="fa fa-caret-down nyil" id="nyil1"></i></a>
		<div id="lenyilomenu">
			<a class="navgomb2" href="./Filmimadok.php">Főoldalra</a>
			<a class="navgomb2" href="./Filmek.php ">Filmek</a>
			<a class="navgomb2" href="./Szineszek.php ">Színészek</a>
			<a class="navgomb2" href="./Rendezok.php">Rendezők</a>
			<a class="navgomb2" href="./Kozosseg.php">Közösség</a>
			';
			if($_SESSION['admin']==1)
			{
				echo '<a class="navgomb2" href="./Admin.php">Admin</a>';
			}
		echo'
		</div>
		<script>
			logo = document.getElementById("logo");
			lenyilomenu = document.getElementById("lenyilomenu");
			nyil1 = document.getElementById("nyil1");
			logo.onclick = function()
			{
				if(lenyilomenu.style.display == "none")
				{
					lenyilomenu.style.display = "block";
					nyil1.style.transform = "rotate(180deg)";

				}
				else
				{
					lenyilomenu.style.display = "none";
					nyil1.style.transform = "rotate(0deg)";
				};
			}

			document.addEventListener("click", (event) => {
				const isClickInside = lenyilomenu.contains(event.target);
				const isClickInside2 = logo.contains(event.target);
				if (!isClickInside &&  !isClickInside2) {

					lenyilomenu.style.display = "none";
					nyil1.style.transform = "rotate(0deg)";
				}
			});
		</script>

		<div id="fejleckozep">
			<a class="navgomb" href="./Filmek.php ">Filmek</a>
			<a class="navgomb" href="./Szineszek.php ">Színészek</a>
			<a class="navgomb" href="./Rendezok.php">Rendezők</a>
			<a class="navgomb" href="./Kozosseg.php">Közösség</a>
			';
			if($_SESSION['admin']==1)
			{
				echo '<a class="navgomb" href="./Admin.php">Admin</a>';
			}
			echo'
		</div>

		<div id="fejlecjobb" >
			<div class="dropdown">
				<button id="reglogbtn" class="dropbtn">'.$_SESSION['felhasznalo_nev'].'
					<i class="fa fa-caret-down nyil" id="nyil2"></i>
				</button>
				<div id="myDropdownS" class="dropdown-contentS" >
					<div class = "kisprofildiv">
						<img src="'.$_SESSION['profilkep'].'" width="80" id="profkepkicsi" alt="Profilkép">
						<input type="text" name="aznevkicsi" id="aznevkicsi" value="'.$_SESSION['felhasznalo_nev'].'" readonly><br>
						<a id="kedvenclinkkicsi" href=""><em>Kedvenceim</em></a><br>
						<a id="nezendokicsi" href=""><em>Megnézendő filmek</em></a>
					</div>
					<div class="fuggovonal"></div>
					<a id="profilrakicsi" href="./Profil.php"><em>Felhasználói profil</em></a><br>
					<a id="beallkicsi" href="./Beallitasok.php"><em>Beállítások</em></a>
					<form>
						<a id="kijkicsi" href="./php/kijelentkezes.php"><em>Kijelentkezés</em></a>
					</form>
				</div>
			</div>
		<script>
			reglogbtn = document.getElementById("reglogbtn");
			myDropdownS = document.getElementById("myDropdownS");
			nyil2 = document.getElementById("nyil2");

			reglogbtn.onclick = function()
			{
				if(myDropdownS.style.display == "none")
				{
				myDropdownS.style.display = "block";
				nyil2.style.transform = "rotate(180deg)";
				}
				else
				{
				myDropdownS.style.display = "none";
				nyil2.style.transform = "rotate(0deg)";
				};
			}

			document.addEventListener("click", (event) => {
				const isClickInside = myDropdownS.contains(event.target);
				const isClickInside2 = reglogbtn.contains(event.target);
				if (!isClickInside &&  !isClickInside2) {
					myDropdownS.style.display = "none";
					nyil2.style.transform = "rotate(0deg)";
				}
				});
		</script>
	</div>
	</div>
	';
}
?>

			