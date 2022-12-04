<?php require_once("./nagyreszthtml/DOCKTYPE.html"); ?>

    <link href="./CSS/filmprofil.css" type="text/css" rel="stylesheet">
    <title>Szinész-profil | Filmimádók</title>
</head>

<?php require_once("./php/fejlec.php"); ?>
        
<!-- weblap -->
<div>
    <!-- FONTOS: Az adabázisból olyan sorrendben kell beilleszteni ahogyan a kikommentezett résznél van irva
    (például az adott színész születési éve és helye - ebben a sorrendben kell beilleszteni)-->
    <!--CSS információ: a css-ek is kikommentezve lettek a könnyebb átláthatóság érdekében-->

    <div class="kozepsoresz"> <!--Ez a div az ugynevezett "main" ez a div adja a vázat, ebben található meg az összes többi kisebb rész-->

        <!--Szinész adatai-->
        <div class="szineszekresz">
            <div class="szineszekkep">
                <img src="./kep/Vasember.jpg" width="100%"> <!-- Ide jön az adott rendező képe az adatbázisbol -->
                <form class="ertekeles"> <!--Ezzel a form-al értékelünk-->
                    <p>Értékelés:</p>
                    <input type="radio" id="ertek1" name="ertek1" value="1">
                    <label for="ertek1" title="zseniális"></label>
                    <input type="radio" id="ertek2" name="ertek2" value="2">
                    <label for="ertek2" title="jó"></label>
                    <input type="radio" id="ertek3" name="ertek3" value="3">
                    <label for="ertek3" title="átlagos"></label>
                    <input type="radio" id="ertek4" name="ertek4" value="4">
                    <label for="ertek4" title="gyenge"></label>
                    <input type="radio" id="ertek5" name="ertek5" value="5">
                    <label for="ertek5" title="rossz"></label>
                </form>
            </div>

            <!--A szinészről lévő leírás-->
            <div class="szineszekleiras" style="overflow-x: auto;">
                <p id="szineszneve">
                    A Vasember <!-- Ide jön a film neve az adatbázisból -->
                    <button class="like-button"></button>
                    <script>
                        document.querySelector('.like-button').addEventListener('click', (e) => {
                            e.currentTarget.classList.toggle('liked');
                        });
                    </script>
                </p>
                <table>
                    <tr>
                        <th>Bemutató</th>
                        <td>2008.05.02</td> <!-- Ide jön az adott film keletkezési ideje-->
                    </tr>
                    <tr>
                        <th>Rendező: </th>
                        <td>Jon Favreau</td> <!-- Ide jön az adott rendező-->
                    </tr>
                </table>
                <div class="szineszdij">
                    <nav class="navszineszdij">
                        <label for="touch1"><span class="spanszineszdij">Filmes elismerései</span></label>               
                        <input type="checkbox" id="touch1"> 
                        <ul class="slideszineszdij"> 
                            <li class="liszineszdij"><a href="#">Robert Downey Jr. - Tony Stark</a></li> <!--Ide jönnek a színészek szerepekkel-->
                            <li class="liszineszdij"><a href="#">Terrence Howard - James „Rhodey” Rhodes</a></li>
                            <li class="liszineszdij"><a href="#">Gwyneth Paltrow - Virginia „Pepper” Potts</a></li>
                            <li class="liszineszdij"><a href="#">Jon Favreau - Happy Hogan</a></li>
                            <li class="liszineszdij"><a href="#">Samuel L. Jackson - Nick Fury</a></li>
                            <li class="liszineszdij"><a href="#">Paul Bettany - JARVIS</a></li>
                            <li class="liszineszdij"><a href="#">Jeff Bridges - Obadiah Stane</a></li>
                            <li class="liszineszdij"><a href="#">Clark Gregg - Phil Coulson</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        
        <!--Szinészgaléria-->
        <div class="gallery-container">
            <div class="thumbnails"></div>
            <div class="scrollbar">
                <div class="thumb"></div>
            </div>
            <div class="slides">
                <div><img src="./kep/Vasember1.jpg" width="540px"></div> <!--Ide jön a filmben készült képek-->
                <div><img src="./kep/Vasember2.jpg" width="540px"></div>
                <div><img src="./kep/Vasember3.jpg" width="540px"></div>
                <div><img src="./kep/Vasember4.jpg" width="540px"></div>
                <div><img src="./kep/Vasember5.jpg" width="540px"></div>
            </div>
            <div class="szineszszerepei">
                <nav class="navszineszszerepei">
                    <label for="touch"><span class="spanszineszszerepei">A film díjai:</span></label>            
                    <input type="checkbox" id="touch"> 
                    <ul class="slideszineszszerepei">
                        <li class="liszineszszerepei"><a href="#"><!--Ide jön a film díjai-->Ide jön a film díjai</a></li>
                    </ul>
                </nav>
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


        <!--Komment szekció-->
        <div class="kommentszekcio">
            <div>
                <div>
                    <h3>
                        Hozzászólások
                    </h3>
                    <div class="kommentiras">
                        <img class="profilkep" src="./kep/profilkep3.jpg" alt="profilkep"><!--Ide a felhasználó saját profilképe jön függetlenül attól hogy kommentelni akar e vagy sem, ez mindig látszik-->
                        <form>
                            <input type="text" id="kiras" placeholder="Írj hozzászólást..." color="white"> <!--Ide írja meg a felhasználó a kommentet-->
                            <input type="submit" value="Megjegyzés" id="submit"> <!--Ez a gomb megnyomásával a felhasználó közzéteszi a kommentet-->
                        </form>
                    </div>
                    <div>

                        <!--A kommentszekcio1 class magába foglalja a kommentet és az ahhoz tartozo képet időt stb... és ezek mellett a kommentre érkező esetleges választ is-->
                        <div class="kommentszekcio1">
                            <img class="profilkep" alt="profilkep" src="./kep/profilkep1.jpg"> <!-- Ide jön a profilképe annak a felhasználónak aki kommentel -->
                            <div class="kommentszekcio2">
                                <div class="komment">
                                    <div class="kommentnev">Tamas1122</div> <!--Ide jön az a felhasználó neve aki kommentel-->
                                    <div class="kommentido">2022-10-19 10:36:24</div> <!--ide jön a komment létrehozásának ideje-->
                                </div>
                                <div class="kommentszoveg">
                                    A Vasember a kedvenc filmem! <!--Ide jön maga a felhasználó hozzászólása-->
                                </div>
                                <a href="#"><i class="fa fa-heart"></i></a> <!--Ezzel a gombbal lehet tetszikelni az adott kommentet-->
                                <a href="#"><i class="fa fa-edit"></i></a> <!--Ezzel a gombbal lehet szerkeszteni a kommentet-->
                                <a href="#"><i class="fa fa-trash"></i></a> <!--Ezzel a gombbal lehet törölni a kommentet-->
                                <div class="kommentikon">
                                    <a href="#"><i class="fa fa-reply"></i></a> <!--Ez a gomb megnyomása után lehet válaszolni a kommentre-->
                                </div>
                            </div>

                            <!--A kommentre érkező válasz, értelemszerűen ez csak akkor jelenik meg ha a fenti "válasz gomb megnyomásra kerül"-->
                            <div class="valaszszekcio">
                                <div class="valaszszekcio1">
                                    <img class="valaszkep" alt="profilkep" src="./kep/profilkep2.jpg"> <!--Ide jön a fenti kommentre válaszolo profilképe DE csak akkor ha válaszol a kommentre ellenkező esetben nincs teendő-->
                                    <div>
                                        <div class="komment">
                                            <div class="valasznev">
                                                Balint123 <!--Ide jön a kommentre válaszolo neve DE csak akkor ha válaszolt a fenti kommentre ellenkező esetben nincs teendő-->
                                            </div>
                                            <div class="valaszido">
                                                2022-10-19 10:40:25 <!--A válaszkomment időpontja DE csak ha létezik a kommentre lévő válasz ellenkező esetben nincs teendő-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="valaszszoveg">
                                        Nekem is ez a kedvenc filmem! <!--Ide jön a válaszkomment maga DE csak akkor ha válaszolt a fenti kommentre ellenkező esetben nincs teendő-->
                                    </div>
                                </div>
                            </div>
                            <!--A kommentre lévő válasz szekció vége-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php require_once("./nagyreszthtml/Footer.html"); ?>