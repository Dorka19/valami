<?php require_once("./nagyreszthtml/DOCKTYPE.html"); ?>

	<link href="./CSS/szineszek.css" type="text/css" rel="stylesheet">
	<title>Szinészek | Filmimádók</Title>
</head>

<?php require_once("./php/fejlec.php"); ?>

<!-- weblap -->
<div>
	<!-- weblapon belüli felhasználói gombos keresés -->
	
		
		<div class="gombnavkozep">
			<div class="kateg"> <button   class="dropbtn4" >Kategóriákban játszott</button>
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
			
			<div class="tobbilenyilomenu"> <button   class="dropbtn5" >Születési dátum</button>
				<div class="dropdown-content4">
					<div class="vertical-menu3">
						<a href="#">1965</a>
						<a href="#">1996</a>
						<a href="#">1993</a>
						<a href="#">1997</a>
						<a href="#">2010</a>
					</div>
				</div>
			</div>		
			
			<div class="tobbilenyilomenu"> <button   class="dropbtn5" >Értékelés</button>
				<div class="dropdown-content5">
					<a href="#">5 &#11088 &#11088 &#11088 &#11088 &#11088 </a>
					<a href="#">4 &#11088 &#11088 &#11088 &#11088 </a>
					<a href="#">3 &#11088 &#11088 &#11088 </a>
					<a href="#">2 &#11088 &#11088 </a>
					<a href="#">1 &#11088 </a>
				</div>
			</div>	

			<div class="tobbilenyilomenu"> <button   class="dropbtn5" >Díjak</button>
				<div class="dropdown-content4">
					<div class="vertical-menu3">
						<a href="#">Szaturnusz-díj </a>
						<a href="#">MTV Movie Award</a> 
						<a href="#">IHG Award</a> 
						<a href="#">Oscar-díj </a>
						<a href="#">People's Choice Awards </a>
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
			
					<label for="search2" class="formazottszovegszuromenu">Neve:</label>
					<input id="search2" class="szovegdobozkismenuszuro" type="text" placeholder="Film címe" name="search2">
					<br>
					<label for="search3" class="formazottszovegszuromenu2">Film címe amiben szerepelt:</label>
					<input id="search3" class="szovegdobozkismenuszuro2" type="text" placeholder="Film szereplői" name="search3">
					<br><br>
					<label for="search4" class="formazottszovegszuromenu2">Film szereplő neve:</label>
					<input id="search4" class="szovegdobozkismenuszuro2" type="text" placeholder="Film színészei" name="search4">
				<br><br>
				
				<div id = "checkdiv">
					<label for="checkfoszereplo" class="formazottszovegszuromenu3" style="margin-left:10px; padding-bottom:15px;">Úgy keresel rá mint főszereplőre ? </label>
					<input type="checkbox"  id="checkmark" >
				</div>
				
				
				<br>
				
				<div class="ertekelokivalaszto">&nbsp;&nbsp;&nbsp;
					<label for="search8" class="formazottszovegszuromenu5">Születési év:</label>
					<br>
					<div class="custom-select">
						<select class="inputs2" id="ertekelokivalasztovalaszto">
							<option value="0">Nem választott</option>
							<option value="1">1967 </option>
							<option value="2">1992 </option>
							<option value="3">1977 </option>
							<option value="4">1982</option>
							<option value="5">1997</option>
						</select>
					</div>
				</div>
				
				<div class="ertekelokivalaszto">&nbsp;&nbsp;&nbsp;
					<label for="search8" class="formazottszovegszuromenu5">Értékelés:</label>
					<br>
					<div class="custom-select">
						<select class="inputs2" id="ertekelokivalasztovalaszto">
							<option value="0">Nem választott</option>
							<option value="1">5 &#11088 &#11088 &#11088 &#11088 &#11088 </option>
							<option value="2">4 &#11088 &#11088 &#11088 &#11088 </option>
							<option value="3">3 &#11088 &#11088 &#11088 </option>
							<option value="4">2 &#11088 &#11088 </option>
							<option value="5">1 &#11088 </option>
						</select>
					</div>
				</div>
				
				<br>
				<div id="reszletkergomb"><button type="submit" class="reszletkerszurogomb">Keresés</button>
				</div>

			</div>
	
	
	
			
	
			<div class="dobozbanszuro2">
		
				<div class=formazottkereso2>
					<label for="search10" class="formazottszovegszuromenu4">Díjai:</label>
						<div class="vertical-menu">
							<a href="#">Szaturnusz-díj </a>
							<a href="#">MTV Movie Award</a> 
							<a href="#">IHG Award</a> 
							<a href="#">Oscar-díj </a>
							<a href="#">People's Choice Awards </a>
						</div>
				</div>
		
				<div class=formazottkereso3 >
					<label for="search9" class="formazottszovegszuromenu4">Nemzetisége:</label>
						<div class="vertical-menu1">
							<a class="nemzetiseg" type="submit"><img title="Amerikai Egyesült Államok" src="../Filmimadok/flag/us.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Angol" src="../Filmimadok/flag/gb.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Spanyol" src="../Filmimadok/flag/es.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Magyar" src="../Filmimadok/flag/hu.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							<a class="nemzetiseg" type="submit"><img title="Francia" src="../Filmimadok/flag/fr.png" alt="zaszlo" class="zaszlomargo" width="40" height="20"></a>
							
						</div>
				</div>
	
				<div class=formazottkereso>
					<label for="search8" class="formazottszovegszuromenu3">Milyen filmekben szerepelt:</label>
						<div class="vertical-menu">
							<a href="#">Akció</a>
							<a href="#">Kaland</a>
							<a href="#">Vígjatok</a>
							<a href="#">Romantikus</a>
							<a href="#">Horror</a>
						</div>
				</div>
			</div>
		</form>
	
		<br>
		<br>
		<hr>

		<div class="szineszekfelsorolasa"> 
			<button class="szineszregomb" type="submit"><img title="Robert Downey Jr." src="./kep/RobertDowneyJr.jpg" alt="Robert Downey Jr." class="szineszesszel" width="75%" height="100%"></button>
			
			<div class="szineszszovegdoboz">
				<div class="margoszel"><a class="szinesznev1" href="#szineszleíras">Robert Downey Jr.</a> </div>
				
					<div class="ertekelesszuros">
						<label class="iranyertek">5 &#11088 &#11088 &#11088 &#11088 &#11088
						</label>
					</div>
					
							<a class="formazottszoveg2">Filmek amikben szerepelt:</a> <br>
							<a class="kategfilmszures" href="#kategoriak"><span  id="" >A Vasember</span></a> |
							<a class="kategfilmszures" href="#kategoriak"><span  id="" >Bosszúállók</span></a> |
							<a class="kategfilmszures" href="#kategoriak"><span  id="" >Sherlock Holmes</span></a> |
							<a class="kategfilmszures" href="#kategoriak"><span  id="" >A hihetetlen Hulk</span></a> 
						
						<br>
						<br>
						<br>
					
						<div class="dobozbal">
							<div class="szovegmargo"><a class="formazottszoveg3">Születési hely:</a> <br> </div>
							<div class="szovegmargo"><a class="formazottszoveg3">Születési idő:</a> <br> </div>
							<div class="szovegmargo"><a class="formazottszoveg3">Nemzetiség:</a> <br> </div>
						</div>
						
						<div class="dobozjobb">
							<div class="szovegmargo"><a class="adatok">Manhattan - Amerika</a> <br>  </div>
							<div class="szovegmargo"><a class="adatok">1965.04.04</a> <br> </div>
							<div class="szovegmargo"><a class="adatok">Amerika</a>  </div>
						</div>
						
					
			</div>
		</div>
	</div>
</div>

<?php require_once("./nagyreszthtml/Footer.html"); ?>