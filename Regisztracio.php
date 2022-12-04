<?php require_once("./php/regmukodes.php") ?>
<?php require_once("./nagyreszthtml/DOCKTYPE.html"); ?>

	<link href="./CSS/regisztracio.css" type="text/css" rel="stylesheet">
	<title>Regisztráció | Filmimádók</Title>
</head>

<?php require_once("./php/fejlec.php"); ?>

<!-- weblap -->
<form action="" id="regform" method="post">
	<div id="regisztdiv">
		<div id="piroshatter">
			<b class="regicimszöveg">Regisztráció</b>
		</div>
		<div class="containerregiszt">
			<hr>
			<label class="reglabels" for="uname"><b>Felhasználónév *</b></label>
			<input class="textinput" type="text" placeholder="Felhasználónév" name="uname" required><br>
				
			<label class="reglabels" for="email"><b>Email *</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input class="textinput" type="text" placeholder="E-mail-cím" name="email" id="email" required><br>
	
			<label class="reglabels" for="psw"><b>Jelszó *</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input class="pwinput" type="password" placeholder="Jelszó" name="psw" id="psw" required><br>
	
			<label class="reglabels" for="psw-repeat"><b>Jelszó újra *</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input class="pwinput" type="password" placeholder="Jelszó újra" name="psw-repeat" id="psw-repeat" required>
			<hr>
		</div>

		<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
		<div class="nemkivalaszto">&nbsp;&nbsp;&nbsp;
			<label for="nemvalaszto" class="labels"><b>Nem:</b></label>
			<br>
			<div class="custom-select">
				<select class="inputs" id="nemvalaszto" name="nemvalaszto">
					<option value="0">Nem választott</option>
					<option value="1">Nő</option>
					<option value="2">Férfi</option>
				</select>
			</div>
		</div>

		<div class="eletkorkivalsztodatum">
			<label for="birthdaytime" id="szullabel" class="labels"><b>Születési dátum:</b></label>
			<br>
			<input class="inputs" type="date" id="birthdaytime" name="birthdaytime">
		</div>
			<div id = "checkdiv">
				<label for="checkreg">A gombra kattintva elfogadod a <a class="linkek" href="./Felhasznalasifelt.php">Felhasználási Feltételeket</a>.</label>
				<input type="checkbox" name="checkreg" id="checkreg">
			</div>
		<div id="regsubmit"><button type="submit" class="registerbtn" name="reg_user">Regisztráció</button></div>
		<p>Már van fiókod? <a class="linkek" href="#logingomb">Jelentkezz be!</a>.</p>
	</div>
</form>
	
<?php require_once("./nagyreszthtml/Footer.html"); ?>