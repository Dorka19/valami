<?php

require_once("DBconnect.php");

if(isset($_POST['submitUjFilm']))
{
    $fcim = htmlspecialchars(trim($_POST['fcim'])); //filmek tábla
    $fsong = htmlspecialchars(trim($_POST['fsong'])); //zenek tabla, kapcsolózábla: megtealalhato benne filmzeen
    $fleiras = htmlspecialchars(trim($_POST['fleiras'])); //filmek tábla
    $fmufaj = htmlspecialchars(trim($_POST['fmufaj'])); //kategoria tábla, de van kapcsolotabla: tartozik_filmkategoria tabla
    $fujmuf = htmlspecialchars(trim($_POST['fujmuf'])); //ezt adja hozzá új műfajként, EZ MÉG NEM MŰKÖDIK

    $nemvalaszto1 = $_POST['nemvalaszto1']; //rendezők tábla, EZ MÉG NEM MŰKÖDIK
    $birthdaytime = $_POST['birthdaytime']; //filmek tábla

    try
        {
        /*beszúrás a filmek táblába*/
        $update = "insert into filmek (cim, kiadasa, leiras) values(:fcim, :birthdaytime, :fleiras)";
        $handleUpdate = $conn->prepare($update);
        $paramsUpdate = [
            ':fcim'=>$fcim,
            ':birthdaytime'=>$birthdaytime,
            ':fleiras'=>$fleiras
        ];
        $handleUpdate->execute($paramsUpdate);

        /*beszúrás a zenek táblába*/
        $update2 = "insert into zenek (cim) values(:fsong)";
        $handleUpdate2 = $conn->prepare($update2);
        $paramsUpdate2 = [
            ':fsong'=>$fsong
        ];
        $handleUpdate2->execute($paramsUpdate2);

        /*a most beszúrt film id-jának lekérdezése*/
        $sql = "select filmID from filmek where cim = :fcim";
        $handleSql = $conn->prepare($sql);
        $paramsSql = [
            ':fcim'=>$fcim
        ];
        $handleSql ->execute($paramsSql);
        $getRow = $handleSql->fetch(PDO::FETCH_ASSOC);
        $filmIDInDB = $getRow['filmID'];

        /*a most beszúrt zene id-jának lekérdezése*/
        $sql2 = "select zeneID from zenek where cim = :fsong";
        $handleSql2 = $conn->prepare($sql2);
        $paramsSql2 = [
            ':fsong'=>$fsong
        ];
        $handleSql2 ->execute($paramsSql2);
        $getRow2 = $handleSql2->fetch(PDO::FETCH_ASSOC);
        $zeneIDInDB = $getRow2['zeneID'];

        /*film összekapcsolása a zenével*/
        $update3 = "insert into megtalalhatobenne_filmzene (filmHIV, zeneHIV) values(:filmIDInDB, :zeneIDInDB)";
        $handleUpdate3 = $conn->prepare($update3);
        $paramsUpdate3 = [
            ':filmIDInDB'=>$filmIDInDB, 
            ':zeneIDInDB'=>$zeneIDInDB
        ];
        $handleUpdate3->execute($paramsUpdate3);

        /*műfaj beszúrása*/
        $update4 = "insert into kategoriak (nev) values(:fmufaj)";
        $handleUpdate4 = $conn->prepare($update4);
        $paramsUpdate4= [
            ':fmufaj'=>$fmufaj
        ];
        $handleUpdate4->execute($paramsUpdate4);

        /*a most beszúrt film összekötése a kategóriával*/
        $sql3 = "select kategoriaID from kategoriak where nev = :fmufaj";
        $handleSql3 = $conn->prepare($sql3);
        $paramsSql3 = [
            ':fmufaj'=>$fmufaj
        ];
        $handleSql3 ->execute($paramsSql3);
        $getRow3 = $handleSql3->fetch(PDO::FETCH_ASSOC);
        $kategoriaIDInDB = $getRow3['kategoriaID'];

        $update5 = "insert into tartozik_filmkategoria (filmHIV, kategoriaHIV) values(:filmIDInDB,:kategoriaIDInDB)";
        $handleUpdate5 = $conn->prepare($update5);
        $paramsUpdate5= [
            ':filmIDInDB'=>$filmIDInDB,
            ':kategoriaIDInDB'=>$kategoriaIDInDB
        ];
        $handleUpdate5->execute($paramsUpdate5);

        /**/


        $success = 'Sikeresen feltöltöttél egy új filmet!';
        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage()." Line:".$e->getLine();
        }

        if(isset($errors) && count($errors) > 0)
        {
            foreach($errors as $error_msg)
            {
                echo '<div class="error_msg" style="box-sizing:border-box; text-align: center; margin: 100px auto -150px auto; max-width: 710px; background-color: #8C0000; padding: 15px; border: 1px solid #4F0000; box-shadow: 0 12px 16px 0 rgb(116 1 1 / 24%), 0 17px 50px 0 rgb(116 1 1 / 19%); font-family: Arial; color: #D6DBD2; font-size: 16px;">'.$error_msg.'</div>';
            }
        }
                
        if(isset($success))
        { 
            echo '<div class="success" style="box-sizing:border-box; text-align: center; margin: 100px auto -150px auto; max-width: 710px; background-color: #8C0000; padding: 15px; border: 1px solid #4F0000; box-shadow: 0 12px 16px 0 rgb(116 1 1 / 24%), 0 17px 50px 0 rgb(116 1 1 / 19%); font-family: Arial; color: #D6DBD2; font-size: 16px;">'.$success.'</div>';
        }
}


?>