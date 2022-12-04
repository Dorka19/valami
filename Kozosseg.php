<?php require_once("./nagyreszthtml/DOCKTYPE.html"); ?>

	<link href="./CSS/kozosseg.css" type="text/css" rel="stylesheet">
	<title>Közösség | Filmimádók</Title>
</head>

<?php require_once("./php/fejlec.php"); ?>

<!-- weblap -->
<div>
	<!-- weblapon belüli felhasználói gombos keresés -->
			
		<div class="gombnavkozep">
			<div class="kateg"> <button   class="dropbtn4" >Felhasználói kedvencek</button>
				<div class="dropdown-content3">
					<div class="vertical-menu2">
						<a href="#">Akció</a>
						<a href="#">Horror</a>
						<a href="#">Kaland</a>
						<a href="#">Romantikus</a>
						<a href="#">Vígjáték</a>
					</div>
				</div>
			</div>		

			<div class="kateg2"> <button   class="dropbtn4" >Felhasználói kommentek</button>
				<div class="dropdown-content3">
					<div class="vertical-menu2">
						<a href="#">Akció</a>
						<a href="#">Horror</a>
						<a href="#">Kaland</a>
						<a href="#">Romantikus</a>
						<a href="#">Vígjáték</a>
					</div>
				</div>
			</div>		
			
			<div class="tobbilenyilomenu"> <button   class="dropbtn5" >Regisztrálási dátum</button>
				<div class="dropdown-content4">
					<div class="vertical-menu3">
						<a href="#">Friss</a>
						<a href="#">Fél éve</a>
						<a href="#">1 éve</a>
						<a href="#">2 éve</a>
						<a href="#">3 éve</a>
						<a href="#">4 éve</a>
						<a href="#">5 éve</a>
						<a href="#">Több mint 5 éve</a>

					</div>
				</div>
			</div>		
			

			<div class="tobbilenyilomenu"> <button   class="dropbtn5" >Nemzetiség</button>
				<div class="dropdown-content6">
					<div class="vertical-menu3">
						<a class="nemzetiseg" type="submit"><img title="Amerikai Egyesült Államok" src="../Filmimadok/flag/us.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Angol" src="../Filmimadok/flag/gb.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Spanyol" src="../Filmimadok/flag/es.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Magyar" src="../Filmimadok/flag/hu.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Francia" src="../Filmimadok/flag/fr.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							
					</div>
				</div>
			</div>	
		
		 <!-- gyorkereső jobb oldala -->
		
		<div class="search-containerplus"> 
			<button class="plusgomb" type="submit"><img title="Részletes szűrő" src="./Webkep/search-alt.png" alt="keresocucc" class="keresokep"></button>
		</div>
		
		<div class="search-container">  <!-- ?? -->
			<form class="gyorskereso"> <!--action="/action_page.php"-->
				<input id="search" class="szovegdobozkismenukereso" type="text" placeholder="Keresés.." name="search">
					<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>



	<div id="margo2">
			
		<form>	
			<label for="search2" class="formazottszovegszuromenu0">Részletes kereső:</label>
		

			<div class="dobozbanszuro">
			
			
					<label for="search3" class="formazottszovegszuromenu4">Felhasználónév:</label>
					<input id="search3" class="szovegdobozkismenuszuro" type="text" placeholder="Felhasználónév" name="search2">
					
					
					<div class="ertekelokivalaszto">&nbsp;&nbsp;&nbsp;
					<label for="search4" class="formazottszovegszuromenu3" >Regisztrálás dátuma:</label>
					<br>
					<div class="custom-select">
						<select class="inputs2" id="ertekelokivalasztovalaszto">
							<option value="0">Nem választott</option>
							<option value="1">Friss </option>
							<option value="2">Fél éve </option>
							<option value="3">1 éve </option>
							<option value="4">2 éve </option>
							<option value="5">3 éve</option>
							<option value="6">4 éve</option>
							<option value="7">5 éve</option>
							<option value="8">Több mint 5 éve</option>
						</select>
					</div>
				</div>
					
					
					<br>
				
				
				<div id="reszletkergomb"><button type="submit" class="reszletkerszurogomb">Keresés</button>
				</div>

			</div>
	
	
	
			
	
	<div class="dobozbanszuro2">
		
		
		<div class=formazottkereso>
		
				<div id = "checkdiv">
					<label for="checkfoszereplo" class="formazottszovegszuromenu3" style="margin-left:10px; padding-bottom:15px;">Megnéznéd a felhasználó kedvenceit? </label>
					<input type="checkbox"  id="checkmark" >
				</div>
				
				<br>
					
					<label for="search5" class="formazottszovegszuromenu3" style="margin-left:10px; padding-bottom:15px;">Felhasználói kedvencek:</label>
					<input id="search5" class="szovegdobozkismenuszuro2" type="text" placeholder="Kulcsszó alapján rákeresve" name="search3">
			
				<br>
				<br>
				
				<div id = "checkdiv">
					<label for="checkfoszereplo" class="formazottszovegszuromenu3" style="margin-left:10px; padding-bottom:15px;">Felhasználó kommentjei</label>
					<input type="checkbox"  id="checkmark" >
				</div>
		
		</div>	


		
		<div class=formazottkereso3 >
				<label for="search6" class="formazottszovegszuromenu3">Nemzetisége:</label>
						<div class="vertical-menu1">
							<a class="nemzetiseg" type="submit"><img title="Amerikai Egyesült Államok" src="../Filmimadok/flag/us.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Angol" src="../Filmimadok/flag/gb.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Spanyol" src="../Filmimadok/flag/es.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Magyar" src="../Filmimadok/flag/hu.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Francia" src="../Filmimadok/flag/fr.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							
						</div>
				</div>
	
			
			</div>
		</form>
	
		<br>
		<br>
		<hr>
		
		
		<!--felhasználó és addatai-->
		<div class="felhasznalokfelsorolasa"> 
			<button class="felhasznalogomb0" type="submit"><img title="Balint123" src="./kep/profilkep1.jpg" alt="felhaszkep" class="felhasznalosszele" width="170px" height="170px"></button>
			
			<div class="felhasznalokszovegdoboz">
				<div class="margoszel"><a class="felhasznaloknev1" href="#szineszleíras">Balint123</a> </div>
				
					<div class="nemzetisegszuros1">
						<a  type="submit"><img title="Magyar" src="../Filmimadok/flag/hu.png" alt="zaszlo"  width="60" height="40" style=" cursor:pointer; "></a>
					</div>
							
							
							<a class="felhasznaloitul" href="#kategoriak"><span  id="" >Felhasználó kedvencei</span></a> |
							<a class="felhasznaloitul" href="#kategoriak"><span  id="" >Felhasználó kommentjei</span></a> 	
							
						<br>
						<br>
						<br>
					
					<div class="dobozbal">
						<div class="szovegmargo"><a class="formazottszoveg3">Regisztrálás dátuma:</a> <br> </div>
						<div class="szovegmargo"><a class="formazottszoveg3">Nemzetiség:</a> <br> </div>
					</div>
						
					<div class="dobozjobb">
						<div class="szovegmargo"><a class="adatok">2021.04.04</a> <br> </div>
						<div class="szovegmargo"><a class="adatok">Magyar</a>  </div>
					</div>
							
						
						
					
			</div>
		</div>
	</div>
</div>

	
		



<?php require_once("./nagyreszthtml/Footer.html"); ?>