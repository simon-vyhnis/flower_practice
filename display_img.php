<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procvičování</title>
</head>
<body>
    <?php
        include 'db_credentials.php';
        $dsn = 'mysql:dbname=' . SQL_DBNAME . ';host=' . SQL_HOST . '';
        $user = SQL_USERNAME;
        $password = SQL_PASSWORD;

            try {
                $pdo = new PDO($dsn, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
            $get_img_query = $pdo->prepare("SELECT image.url, flower.name FROM image INNER JOIN flower ON flower.id = image.flower_id ORDER BY RAND() LIMIT 1");
            $get_img_query->execute();
            $img = $get_img_query->fetch();

            echo ("<img src=\"". $img["url"] . "\"/>");
            //echo("<button class=\"button\" onclick=\"history.go(-1)\">Zpět</button>");

    ?>
</body>
</html>