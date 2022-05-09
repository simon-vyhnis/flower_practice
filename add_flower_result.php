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
            $add_flower_query = $pdo->prepare("INSERT INTO flower (name) VALUES(?)");
            $add_flower_query->execute(array($_POST["name"]))

    ?>
</body>
</html>