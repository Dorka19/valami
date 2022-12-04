<?php
require_once("DBconnect.php");

if(isset($_POST['submitMagamrol']) && isset($_SESSION['felhasznaloID']))
{
    $id=$_SESSION['felhasznaloID'];
    $magamrol = $_POST['magamrol'];

    try
    {
        $update = "update felhasznalok set felhasznalo_leirasa = :magamrol where felhasznaloID = :id";
        $handleUpdate = $conn->prepare($update);
        $paramsUpdate = [
        ':magamrol'=>$magamrol,
        ':id'=>$id
        ];
    
        $handleUpdate->execute($paramsUpdate);
        $_SESSION['felhasznalo_leirasa'] = $magamrol;
        $success = 'Leírásod megváltozott!';

    }
    catch(Exception $e)
    {
        $errors[] = $e->getMessage();
    }

    if(isset($errors) && count($errors) > 0)
    {
        foreach($errors as $error_msg)
        {
            echo '<div class="error_msg" style="box-sizing:border-box; text-align: center; margin: 100px auto -70px auto; max-width: 900px; background-color: #8C0000; padding: 15px; border: 1px solid #4F0000; box-shadow: 0 12px 16px 0 rgb(116 1 1 / 24%), 0 17px 50px 0 rgb(116 1 1 / 19%); font-family: Arial; color: #D6DBD2; font-size: 16px;">'.$error_msg.'</div>';
        }
    }
                
    if(isset($success))
    { 
        echo '<div class="success" style="box-sizing:border-box; text-align: center; margin: 100px auto -70px auto; max-width: 900px; background-color: #8C0000; padding: 15px; border: 1px solid #4F0000; box-shadow: 0 12px 16px 0 rgb(116 1 1 / 24%), 0 17px 50px 0 rgb(116 1 1 / 19%); font-family: Arial; color: #D6DBD2; font-size: 16px;">'.$success.'</div>';
    }
}
?>