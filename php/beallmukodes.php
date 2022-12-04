<?php
session_start();
require_once("DBconnect.php");
if(isset($_SESSION['felhasznaloID']))
{
    $id=$_SESSION['felhasznaloID'];
    /*email cim modositasa*/
    if(isset($_POST['submitEmail']))
    {
        $emailvalt = htmlspecialchars(trim($_POST['emailvalt']));
        
        try
        {
        $update = "update felhasznalok set email_cim = :emailvalt where felhasznaloID = :id";
        $handleUpdate = $conn->prepare($update);
        $paramsUpdate = [
            ':emailvalt'=>$emailvalt,
            ':id'=>$id
        ];
        
        $handleUpdate->execute($paramsUpdate);

        $success = 'Sikeresen megváltoztattad az e-mail címedet!';

        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }
    }

    /*jelszo modositasa*/
    if(isset($_POST['submitJelszo']))
    {
        $regijelszo = htmlspecialchars(trim($_POST['regijelszo']));
        $ujjelszo1 = htmlspecialchars(trim($_POST['ujjelszo1']));
        $ujjelszo2 = htmlspecialchars(trim($_POST['ujjelszo2']));

        
        try
        {
        $sql = "select jelszo from felhasznalok where felhasznaloID = :id";
        $handleSql = $conn->prepare($sql);
        $paramsSql = [
            ':id'=>$id
        ];
        
        $handleSql ->execute($paramsSql);
        $getRow = $handleSql->fetch(PDO::FETCH_ASSOC);
        $pswInDB = $getRow['jelszo'];
        if($ujjelszo1 == $ujjelszo2 && sha1($regijelszo) == $pswInDB)
        {
            $hashPassword = sha1($ujjelszo1);
            $update = "update felhasznalok set jelszo = :hashPassword where felhasznaloID = :id";
            try
            {
            $handleUpdate = $conn->prepare($update);
            $paramsUpdate = [
                ':hashPassword'=>$hashPassword,
                ':id'=>$id
            ];
            
            $handleUpdate->execute($paramsUpdate);

            $success = 'Sikeresen megváltoztattad a jelszavadat!';
            }
            catch(Exception $e)
            {
                $errors[] = $e->getMessage();
            }
        }
        else if($ujjelszo1 != $ujjelszo2)
        {
            $errors[] = "A két új jelszó mező nem egyezik!";
        }
        else if(sha1($regijelszo) != $pswInDB)
        {
            $errors[] = "Rossz régi jelszót adtál meg!";
        }
        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }
            
        
    }

    /*nem beallitasa*/

    if(isset($_POST['submitNem']))
    {
        $nembeall = $_POST['nembeall'];

        try
        {
        $update = "update felhasznalok set neme = :nembeall where felhasznaloID = :id";
        $handleUpdate = $conn->prepare($update);
        $paramsUpdate = [
            ':nembeall'=>$nembeall,
            ':id'=>$id
        ];
        
        $handleUpdate->execute($paramsUpdate);

        $success = 'Sikeres beállítás!';
        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }
    }

    /*nemzetiseg beallitasa*/
    if(isset($_POST['submitNemzet']))
    {
        $nemzetbeall = $_POST['nemzetbeall'];
        
        try
        {
        $sql = "select nemzetisegID from nemzetisegek where nev = :nemzetbeall";
        $handleSql = $conn->prepare($sql);
        $paramsSql = [
            ':nemzetbeall'=>$nemzetbeall
        ];
        
        $handleSql ->execute($paramsSql);
        $getRow = $handleSql->fetch(PDO::FETCH_ASSOC);
        $nemzetisegInDB = $getRow['nemzetisegID'];
        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }

        try
        {
        $update = "update felhasznalok set orszagaKAPCS = :nemzetisegInDB where felhasznaloID = :id";
        $handleUpdate = $conn->prepare($update);
        $paramsUpdate = [
            ':nemzetisegInDB'=>$nemzetisegInDB,
            ':id'=>$id
        ];
        
        $handleUpdate->execute($paramsUpdate);
        $success = 'Sikeres beállítás!';
        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }
    }

    /*szuletesi datum beallitasa*/
    if(isset($_POST['submitSzul']))
    {
        $szulvalt = $_POST['szulvalt'];

        try
        {
        $update = "update felhasznalok set szuletesi_datum = :szulvalt where felhasznaloID = :id";
        $handleUpdate = $conn->prepare($update);
        $paramsUpdate = [
            ':szulvalt'=>$szulvalt,
            ':id'=>$id
        ];
        
        $handleUpdate->execute($paramsUpdate);
        $success = 'Sikeres beállítás!';
        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }
    }

    /*profilkep beallitasa*/
    if(isset($_POST['submitProf']))
    {
        $profpic = $_POST['profpic'];

        try
        {
        $sql = "select profilkepID from profilkepek where linkje = :profpic";
        $handleSql = $conn->prepare($sql);
        $paramsSql = [
            ':profpic'=>$profpic
        ];
        
        $handleSql ->execute($paramsSql);
        $getRow = $handleSql->fetch(PDO::FETCH_ASSOC);
        $profkepInDB = $getRow['profilkepID'];

        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }

        try
        {
        $update = "update felhasznalok set profilkepKAPCS = :profkepInDB where felhasznaloID = :id";
        $handleUpdate = $conn->prepare($update);
        $paramsUpdate = [
            ':profkepInDB'=>$profkepInDB,
            ':id'=>$id
        ];
        
        $handleUpdate->execute($paramsUpdate);
        $_SESSION['profilkep'] = $profpic;
        $success = 'Sikeresen beállítottad a profilképedet!';
        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }
    }

    /*sajat fiok felfuggesztese*/
    if(isset($_POST['submitOnfelfugg']))
    {
        $date = date('Y-m-d H:i:s');
        
        try
        {
        $sql = "select * from felhasznalok where felhasznaloID = :id";
        $handleSql = $conn->prepare($sql);
        $paramsSql = [
            ':id'=>$id
        ];
        
        $handleSql ->execute($paramsSql);
        $getRow = $handleSql->fetch(PDO::FETCH_ASSOC);
        $felhasznaloIDinDB = $getRow['felhasznaloID'];

        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }

        try
        {
        $update = "insert into felfuggesztes (oka, ideje, felfuggesztveKAPCS, eddig) values('önfelfüggesztés', :date, :felhasznaloIDinDB, 'null')";
        $handleUpdate = $conn->prepare($update);
        $paramsUpdate = [
            ':date'=>$date,
            ':felhasznaloIDinDB'=>$felhasznaloIDinDB
        ];
        
        $handleUpdate->execute($paramsUpdate);

        $success = 'Felfüggesztetted a fiókodat!';
        }
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }
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