<?php
require_once("DBconnect.php");

if(isset($_POST['reg_user']))
{   
    if(isset($_POST['uname'],$_POST['email'],$_POST['psw']) && !empty($_POST['psw-repeat']) && !empty($_POST['checkreg']))
    {
        $uname = htmlspecialchars(trim($_POST['uname']));
		$email = htmlspecialchars(trim($_POST['email']));
		$psw = htmlspecialchars(trim($_POST['psw']));
		$pswRepeat = htmlspecialchars(trim($_POST['psw-repeat']));
		$nemvalaszto = $_POST['nemvalaszto'];
        $profilkepKAPCS = 5;
        $felhasznalo_leirasa = "Hobbim a filmnézés.";
        if($nemvalaszto==2)
        {
            $nemvalaszto="férfi";
        }
        if($nemvalaszto==1)
        {
            $nemvalaszto="nő";
        }

		$birthdaytime = $_POST['birthdaytime'];
		$checkreg = $_POST['checkreg'];
    
        $hashPassword = sha1($psw);
        $date = date('Y-m-d H:i:s');
 
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
            $sql = 'select * from felhasznalok where felhasznalo_nev = :uname';
            $stmt = $conn->prepare($sql);
            $p = [':uname'=>$uname];
            $stmt->execute($p);
            $result=$stmt->fetchAll(PDO::FETCH_NUM);
            
            if($stmt->rowCount() == 0 && $psw == $pswRepeat)
            {
                $sql = "insert into felhasznalok (felhasznalo_nev, neme, regisztralas_ideje, email_cim, admin, szuletesi_datum, jelszo, felhasznalo_leirasa, profilkepKAPCS) values(:uname,:nemvalaszto,:date,:email, 0,:birthdaytime, :psw, :felhasznalo_leirasa, :profilkepKAPCS)";
            
                try{
                    $handle = $conn->prepare($sql);
                    $params = [
                        ':uname'=>$uname,
                        ':nemvalaszto'=>$nemvalaszto,
                        ':date'=>$date,
                        ':email'=>$email,
                        ':birthdaytime'=>$birthdaytime,
                        ':psw'=>$hashPassword,
                        ':felhasznalo_leirasa'=>$felhasznalo_leirasa,
                        ':profilkepKAPCS'=>$profilkepKAPCS
                    ];
                    
                    $handle->execute($params);
                    
                    $success = 'A regisztráció sikeres!';
                    
                }
                catch(connException $e){
                    $errors[] = $e->getMessage();
                }
            }
			else if($stmt->rowCount() > 0 && $psw == $pswRepeat)
            {
				$valUname = $uname;
                $valNemvalaszto = $nemvalaszto;
                $valEmail = '';
                $valBirthdaytime = $birthdaytime;
				$valPsw = $psw;
                $errors[] = 'Ezzel a felhasználónévvel már regisztráltak!';
            }
            else if($stmt->rowCount() == 0 && $psw != $pswRepeat)
            {
				$valUname = $uname;
                $valNemvalaszto = $nemvalaszto;
                $valEmail = '';
                $valBirthdaytime = $birthdaytime;
				$valPsw = $psw;
                $errors[] = 'A Jelszó és a Jelszó újra mezők nem egyeznek!';
            }
		}
		else
		{
			$errors[] = "Az e-mail cím nem valid!";
		}
    }
    else
    {
        if(!isset($_POST['uname']) || empty($_POST['uname']))
        {
            $errors[] = 'A Felhasználónév mező kitöltése kötelező!';
        }
        else
        {
            $valUname = $_POST['uname'];
        }
 
        if(!isset($_POST['email']) || empty($_POST['email']))
        {
            $errors[] = 'Az Email mező kitöltése kötelező!';
        }
        else
        {
            $valEmail = $_POST['email'];
        }
 
        if(!isset($_POST['psw']) || empty($_POST['psw']))
        {
            $errors[] = 'A Jelszó mező kitöltése kötelező!';
        }
        else
        {
            $valPsw = $_POST['psw'];
        }

		if(!isset($_POST['psw-repeat']) || empty($_POST['psw-repeat']))
        {
            $errors[] = 'A Jelszó újra mező kitöltése kötelező!';
        }

        if(empty($_POST['checkreg']))
        {
            $errors[] = 'Fogadd el a Felhasználási Feltételeket!';
        }
        
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
?>