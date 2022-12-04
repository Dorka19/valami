<?php
require_once("DBConnect.php");

if(isset($_POST['submit']))
{
	if(isset($_POST['uname'],$_POST['psw']) && !empty($_POST['uname']) && !empty($_POST['psw']))
	{
		$uname = htmlspecialchars(trim($_POST['uname']));
		$psw = htmlspecialchars(trim($_POST['psw']));

        $hashPassword = sha1($psw);
        echo $hashPassword;
        echo "<br>";
        $sql = "select * from felhasznalok where felhasznalo_nev = :uname ";
        $handle = $conn->prepare($sql);
        $params = [':uname'=>$uname];
        $handle->execute($params);
        $getRow = $handle->fetch(PDO::FETCH_ASSOC);
        $pswInDB = $getRow['jelszo'];
        $idInDB = $getRow['felhasznaloID'];

        if($handle->rowCount() > 0)
        {
            if($hashPassword == $pswInDB)
            {
                $felfuggSql = "select oka from felfuggesztes JOIN felhasznalok ON felfuggesztveKAPCS = :idInDB AND oka='önfelfüggesztés'";
                $handleFelfugg = $conn->prepare($felfuggSql);
                $paramsFelfugg = [':idInDB'=>$idInDB];
                $handleFelfugg->execute($paramsFelfugg);

                $felfuggSql2 = "select oka from felfuggesztes JOIN felhasznalok ON felfuggesztveKAPCS = :idInDB AND oka!='önfelfüggesztés'";
                $handleFelfugg2 = $conn->prepare($felfuggSql2);
                $paramsFelfugg2 = [':idInDB'=>$idInDB];
                $handleFelfugg2->execute($paramsFelfugg2);
                $infok=$handleFelfugg2->fetch(PDO::FETCH_ASSOC);

                if($handleFelfugg->rowCount() == 0 && $handleFelfugg2->rowCount() == 0)
                {
                    unset($getRow['jelszo']);
                    $_SESSION['felhasznaloID']=$getRow['felhasznaloID'];
                    $id=$_SESSION['felhasznaloID'];
                    $_SESSION['felhasznalo_nev'] = $getRow['felhasznalo_nev'];
                    $_SESSION['neme'] = $getRow['neme'];
                    $_SESSION['regisztralas_ideje'] = $getRow['regisztralas_ideje'];
                    $_SESSION['email_cim'] = $getRow['email_cim'];
                    $_SESSION['szuletesi_datum'] = $getRow['szuletesi_datum'];
                    $_SESSION['felhasznalo_leirasa'] = $getRow['felhasznalo_leirasa'];
                    $_SESSION['admin'] = $getRow['admin'];
                    $_SESSION['orszagaKAPCS'] = $getRow['orszagaKAPCS'];

                    /*Emlekezz ram checkbox*/ 
                    
                    if(!empty($_POST["remember"]))
                    {
                        setcookie("uname",$uname,time()+ 3600);
                        setcookie("psw",$psw,time()+ 3600);
                        echo "Cookies Set Successfuly";
                    }
                    else
                    {
                        setcookie("uname","");
                        setcookie("psw","");
                    }

                    $nemzetisegSql = 'select nev from nemzetisegek inner join felhasznalok on nemzetisegID=orszagaKAPCS AND felhasznaloID=:id';
                    $nemzetisegSqlHandle = $conn->prepare($nemzetisegSql);
                    $idParam = [':id'=>$id];
                    $nemzetisegSqlHandle->execute($idParam);
                    $getRow2 = $nemzetisegSqlHandle->fetch(PDO::FETCH_ASSOC);
                    $nemzetiseg = $getRow2['nev'];
                    $_SESSION['nemzetiseg'] = $nemzetiseg;

                    $profKepSql = 'select linkje from profilkepek inner join felhasznalok on profilkepID=profilkepKAPCS AND felhasznaloID=:id';
                    $profKepSqlHandle = $conn->prepare($profKepSql);
                    $idParam = [':id'=>$id];
                    $profKepSqlHandle->execute($idParam);
                    $getRow3 = $profKepSqlHandle->fetch(PDO::FETCH_ASSOC);
                    $profilkep = $getRow3['linkje'];
                    $_SESSION['profilkep'] = $profilkep;
                    echo $_SESSION['profilkep'];
                    header('Location: ./Profil.php');
                    exit();
                }
                else if($handleFelfugg->rowCount() > 0)
                {
                    $errors[] = "Fiókodat felfüggesztetted! Ha aktívvá szeretnéd tenni, vedd fel a kapcsolatot az adminnal!";
                }
                else if($handleFelfugg2->rowCount() > 0)
                {   //az eddig oszlopot nem írja ki :()
                    $errors[] = "Fiókod felfüggesztésre került! A felfüggesztés oka: ".$infok['oka'].". A felfüggesztés lejár ekkor: ".$infok['eddig'];
                }
                
            }
            else
            {
                $errors[] = "Rossz felhasználónevet/jelszót adtál meg!";
            }
        }
	}
	else
	{
		$errors[] = "Add meg a felhasználónevedet és a jelszavadat!";	
	}
}

if(isset($errors) && count($errors) > 0)
{
    foreach($errors as $error_msg)
    {
        echo '<div style="box-sizing:border-box; text-align: center; margin: 100px auto -150px auto; max-width: 710px; background-color: #8C0000; padding: 15px; border: 1px solid #4F0000; box-shadow: 0 12px 16px 0 rgb(116 1 1 / 24%), 0 17px 50px 0 rgb(116 1 1 / 19%); font-family: Arial; color: #D6DBD2; font-size: 16px;">'.$error_msg.'</div>';
    }
}
?>