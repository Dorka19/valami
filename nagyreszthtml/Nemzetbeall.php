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
    <h1>Nemzetiség beállítása</h1>
    <form method="post" action="../php/beallmukodes.php">
        <label for="orszagbeall">Válaszd ki az nemzetiségedet: </label><br><br>
        <select name="nemzetbeall" id="nemzetbeall">
            <?php
            try
            {
            $sql = "select nev from nemzetisegek";
            $handleSql = $conn->prepare($sql);
            
            $handleSql->execute();
           
                $results = $handleSql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($results as $result) {
                    echo
                    "
                        <option>".$result['nev']."</option>
                    ";
                }
            }
            
            catch(Exception $e)
            {
                $errors[] = $e->getMessage();
            }
            ?>
        </select><br><br><br>
        <input class="balra" type="submit" value="Mentés" name="submitNemzet" id="submitNemzet">
    </form>
</body>
</html>