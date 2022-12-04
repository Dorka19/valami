<?php require_once("./nagyreszthtml/DOCKTYPE.html"); ?>

	<link href="./CSS/fooldal.css" type="text/css" rel="stylesheet">
	<title>Filmimádók</Title>
</head>

<?php require_once("./php/fejlec.php"); ?>

<!-- weblap -->
<div><a class="navgomb" href="./Profil.php ">Profil elérés</a><a class="navgomb" href="./Beallitasok.php ">Beallitasok elérés</a><a class="navgomb" href="./Filmprofil.php ">Filprofil elérés</a><a class="navgomb" href="./Rendezoprofil.php ">Rendezőprofil elérés</a><a class="navgomb" href="./Szineszprofil.php ">Színészprofil elérés</a><div class="kulso"><br>

            <!-- FONTOS: Az adabázisból olyan sorrendben kell beilleszteni ahogyan a kikommentezett résznél van irva
            (például az adott színész születési éve és helye - ebben a sorrendben kell beilleszteni)-->
            <!--CSS információ: a css-ek is kikommentezve lettek a könnyebb átláthatóság érdekében-->

            <div class="kozepsoresz"> <!--Ez a div az ugynevezett "main" ez a div adja a vázat, ebben található meg az összes többi kisebb rész-->

                    <div class = "bemutatkozoszoveg">
                        <div>
                            <h1>Üdvözlünk a Filmimádók oldalán!<br></h1>
                           Az oldalunkon a világ összes magyar és külföldi filmjeiről, színészeiről 
                           és rendezőiről találhatsz értékeléseket, véleményeket! Oszd meg
                           az oldal követőivel értékeléseidet, véleményedett a kedvenc 
                           színészedről, rendeződről vagy éppen a kedvenc filmedről!
                        </div>
                    </div>

                <table>
                    <tr>
                        <td>
                            <img src="./kep/action.jpg" width="40px" height="40px"><br>
                            <p>AKCIÓFILM</p>
                        </td>
                        <td>
                            <img src="./kep/adventure.png" width="40px" height="40px"><br>
                            <p>KALAND</p>
                        </td>
                        <td>
                            <img src="./kep/drama.jpg" width="40px" height="40px"><br>
                            <p>DRÁMA</p>
                        </td>
                        <td>
                            <img src="./kep/horror.png" width="40px" height="40px"><br>
                            <p>HORROR</p>
                        </td>
                        <td>
                            <img src="./kep/scifi.png" width="40px" height="40px"><br>
                            <p>SCI-FI</p>
                        </td>
                        <td>
                            <img src="./kep/romantic.png" width="40px" height="40px"><br>
                            <p>ROMANTIKUS</p>
                        </td>
                    </tr>
                </table>
                <div style="background-color:lightgrey">
                    <div class="galeriaszoveg">
                        <p >
                            <b>Legjobbra értékelt filmeink </b>
                        </p>
                        <div class="gallery-container">
                            <div class="thumbnails"></div>
                            <div class="scrollbar">
                            <div class="thumb"></div>
                            </div>
                            <div class="slides">
                            <div><img src="./kep/img21.jpg"></div>
                            <div><img src="./kep/img2.jpg"></div>
                            <div><img src="./kep/img3.jpg"></div>
                            <div><img src="./kep/img4.jpg"></div>
                            <div><img src="./kep/img11.jpg"></div>
                            <div><img src="./kep/img6.jpg"></div>
                            <div><img src="./kep/img7.jpg"></div>
                            <div><img src="./kep/img8.jpg"></div>
                            <div><img src="./kep/img10.jpg"></div>
                            <div><img src="./kep/img45.jpg"></div>
                            </div>
                        </div>
                    </div>

            <div class="galeriaszoveg">
                        <p >
                            <b>A 3 legjobbra értékelt szinész </b>
                        </p>
                        <div class="gallery-container2">
                            <div class="thumbnails2"></div>
                            <div class="scrollbar2">
                            <div class="thumb2"></div>
                            </div>
                            <div class="slides2">
                            <div>Bradley Cooper<img src="./kep/BradleyCooper.jpg"></div>
                            <div>Robert Clark Gregg<img src="./kep/RobertClarkGregg.jpg"></div>
                            <div>Robert Downey Jr.<img src="./kep/RobertDowneyJr.jpg"></div>
                            </div>
                        </div>
                    </div>

                    <div class="galeriaszoveg">
                        <p >
                            <b>A 3 legjobbra értékelt rendező </b>
                        </p>
                        <div class="gallery-container3">
                            <div class="thumbnails3"></div>
                            <div class="scrollbar3">
                            <div class="thumb3"></div>
                            </div>
                            <div class="slides3">
                            <div>Jonathan Favreau<img src="./kep/JonathanFavreau.jpg"></div>
                            <div>James Cameron<img src="./kep/JamesCameron.jpg"></div>
                            <div>Todd Phillips<img src="./kep/ToddPhillips.jpg"></div>
                            </div>
                        </div>
                    </div>
            </div>
                <script>
                    const slideGallery = document.querySelector('.slides');
                    const slides = slideGallery.querySelectorAll('div');
                    const scrollbarThumb = document.querySelector('.thumb');
                    const slideCount = slides.length;
                    const slideHeight = 720;
                    const marginTop = 16;
                    const scrollThumb = () => {
                    const index = Math.floor(slideGallery.scrollTop / slideHeight);
                    scrollbarThumb.style.height = `${((index + 1) / slideCount) * slideHeight}px`;
                    };
                    const scrollToElement = el => {
                    const index = parseInt(el.dataset.id, 10);
                    slideGallery.scrollTo(0, index * slideHeight + marginTop);
                    };
                    document.querySelector('.thumbnails').innerHTML += [...slides]
                    .map(
                        (slide, i) => `<img src="${slide.querySelector('img').src}" data-id="${i}">`
                    )
                    .join('');
                    document.querySelectorAll('.thumbnails img').forEach(el => {
                    el.addEventListener('click', () => scrollToElement(el));
                    });
                    slideGallery.addEventListener('scroll', e => scrollThumb());
                    scrollThumb();
                </script>
            </div>
        </div>

<?php require_once("./nagyreszthtml/Footer.html"); ?>