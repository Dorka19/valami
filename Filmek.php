<?php require_once("./nagyreszthtml/DOCKTYPE.html"); ?>

	<link href="./CSS/filmek.css" type="text/css" rel="stylesheet">
	<title>Filmek | Filmimádók</Title>
</head>

<?php require_once("./php/fejlec.php"); ?>

<!-- weblap -->
<div>
	<!-- weblapon belüli felhasználói gombos keresés -->
	
	<div class="gombnavkozep">
		
		<div class="kateg"> <button   class="dropbtn4" >Kategóriák</button>
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
		
		<div class="tobbilenyilomenu"> <button   class="dropbtn5" >Kiadási év</button>
			<div class="dropdown-content4">
				<div class="vertical-menu3">
					<a href="#">2008</a>
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
		<!--<div id="reszletesmenufeliratformazva">Filmek részletes szűrője:</div>-->
			
		<form>	
			<label for="search2" class="formazottszovegszuromenu0">Részletes kereső:</label>
		

			<div class="dobozbanszuro">
			
				<label for="search3" class="formazottszovegszuromenu">Címe:</label>
				<input id="search3" class="szovegdobozkismenuszuro" type="text" placeholder="Film címe" name="search3">
				<br>
				<label for="search4" class="formazottszovegszuromenu2">Szereplő:</label>
				<input id="search4" class="szovegdobozkismenuszuro2" type="text" placeholder="Film szereplői" name="search4">
				<br>
				<label for="search5" class="formazottszovegszuromenu2">Színészei:</label>
				<input id="search5" class="szovegdobozkismenuszuro2" type="text" placeholder="Film színészei" name="search5">
				<br>
				<label for="search6" class="formazottszovegszuromenu2">Rendező:</label>
				<input id="search6" class="szovegdobozkismenuszuro" type="text" placeholder="Film rendezője" name="search6">
				<br>
			
				<label for="search7" class="formazottszovegszuromenu">Zenék:</label>
				<input id="search7" class="szovegdobozkismenuszuro" type="text" placeholder="Film zenéi" name="search7">
				
				
				<div class="ertekelokivalaszto">&nbsp;&nbsp;&nbsp;
					<label for="search8" class="formazottszovegszuromenu2">Értékelés:</label>
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
				
				<div id="reszletkergomb"><button type="submit" class="reszletkerszurogomb">Keresés</button>
				</div>

			</div>
	
	
	
			<div class="dobozbanszuro2">
	
				<div class=formazottkereso2>
					<label for="search9" class="formazottszovegszuromenu3">Díjak:</label>
					<div class="vertical-menu">
						<a href="#">Szaturnusz-díj </a>
						<a href="#">MTV Movie Award</a> 
						<a href="#">IHG Award</a> 
						<a href="#">Oscar-díj </a>
						<a href="#">People's Choice Awards </a>
					</div>
				</div>
	
				<div class=formazottkereso3 >
					<label for="search10" class="formazottszovegszuromenu3">Kiadási év:</label>
					<div class="vertical-menu">
						<a href="#">2008</a>
						<a href="#">1996</a>
						<a href="#">1993</a>
						<a href="#">1997</a>
						<a href="#">2010</a>
					</div>
				</div>

				<div class=formazottkereso>
					<label for="search11" class="formazottszovegszuromenu3">Kategóriák:</label>
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

		<div class="filmekfelsorolasa"> 
			<button class="filmregomb" type="submit"><img title="A Vasember" src="./kep/Vasember.jpg" alt="filmesplakátkép" class="filmesszel" width="180" height="180"></button>
			<div class="filmszovegdoboz">
				<div class="margoszel"><a class="fofilmnev" href="#filmesleíras">A Vasember</a>
				</div>
				<div class="ertekelesszuros">
					<label class="iranyertek">5 &#11088 &#11088 &#11088 &#11088 &#11088
					</label>
				</div>
				
				<a class="kategfilmszures" href="#kategoriak"><span  id="" >Akció</span></a> |
				<a class="kategfilmszures" href="#kategoriak"><span  id="" >Kaland</span></a> |
				<a class="kategfilmszures" href="#kategoriak"><span  id="" >Sci-fi</span></a>
				<br>
				<br>
				<br>
				<div class="betustilus">
					<label >
					A Vasember (eredeti cím: Iron Man) 2008-ban bemutatott szuperhősfilm a Marvel Comics Vasember-képregényei alapján, amit Jon Favreau rendezett. <br>
					A főbb szerepekben Robert Downey Jr., mint a címszereplő Vasember, Gwyneth Paltrow, Terrence Howard és Jeff Bridges látható. A Marvel-moziuniverzum első filmje.
					Tony Stark, a milliárdos fegyvergyárost terroristák erjtik foglyul Afganisztánban. Rakéta összeszerelésére kényszerítik, azonban Stark a rendelkezésre álló eszközökből páncélzatot épít magának a szökéshez. A fogságban szembesül a saját cége gyártmányai okozta pusztítással. Amerikába visszatérve továbbfejleszti művét, s a technológiára támaszkodó szuperhős, Vasember válik belőle, aki az ellen kezd harcolni, aminek azelőtt maga is vezető képviselője volt. </label>
				</div>
				
				</div>
			</div>
		</div>
	
	
	
	
<?php require_once("./nagyreszthtml/Footer.html"); ?>


	