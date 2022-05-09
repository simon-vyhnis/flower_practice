<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat kytku</title>
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

        $add_image_query = $pdo->prepare("INSERT INTO image (url, flower_id) VALUES (?, ?)");
        $add_image_query->execute(array($_POST["url"], $_POST["flower_id"]));
        echo ("<p>Úspěšně přidáno!</p>");
        echo("<button class=\"button\" onclick=\"history.go(-2)\">Zpět</button>");
    ?>
</body>
</html>