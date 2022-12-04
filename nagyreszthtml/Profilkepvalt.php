<?php require_once("../php/DBconnect.php"); ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/beallframes.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1>Profilkép beállítása</h1>
    <form method="post" action="../php/beallmukodes.php">
        <div>
        <?php
        try
        {
        $sql = "select * from profilkepek";
        $handleSql = $conn->prepare($sql);
        $handleSql->execute();
            
        $results = $handleSql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $result)
            {
                echo
                "
                <label for='profpic'>
                <input class='radiosForProf' type='radio' id='".$result['profilkepID']."' name='profpic' value='".$result['linkje']."'>
                <img class='prof' src='../".$result['linkje']."' alt='".$result['profilkepID']."'>
                </label>
                ";
            }
        }
        
        catch(Exception $e)
        {
            $errors[] = $e->getMessage();
        }
        ?>
        </div>
        <br><br><br>
        <input type="submit" value="Mentés" id="submitProf" name="submitProf">
    </form>
</body>
</html>