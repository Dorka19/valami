<?php
require_once("config.php");
try{
    $conn= new PDO("mysql:host=".HOST.";dbname=".DATABASE,DBUSER,DBPASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    $str=$e->getMessage();
    echo 
    "<script>\n
        var str='K\u0332é\u0332r\u0332l\u0332e\u0332k\u0332 \u0332t\u0332ö\u0332l\u0332t\u0332s\u0332e\u0332d\u0332 \u0332ú\u0332j\u0332r\u0332a\u0332 \u0332a\u0332z\u0332 \u0332o\u0332l\u0332d\u0332a\u0332l\u0332t\u0332!';\n
        alert('Connection failed: $str. '+str);\n
    </script>\n";
    die();
}catch(Exception $e){
    $str=$e->getMessage();
    echo 
    "<script>\n
        var str='K\u0332é\u0332r\u0332l\u0332e\u0332k\u0332 \u0332t\u0332ö\u0332l\u0332t\u0332s\u0332e\u0332d\u0332 \u0332ú\u0332j\u0332r\u0332a\u0332 \u0332a\u0332z\u0332 \u0332o\u0332l\u0332d\u0332a\u0332l\u0332t\u0332!';\n
        alert('Ismeretlen hiba: $str. '+str);\n
    </script>\n";
    die();
}
?>