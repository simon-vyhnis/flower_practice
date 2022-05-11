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
            $get_flowers_query = $pdo->prepare("SELECT * FROM flower");
            $get_flowers_query->execute();
            $flowers = $get_flowers_query->fetchAll();

            foreach($flowers as $flower){
                $get_img_count_query = $pdo->prepare("SELECT COUNT(id) as num FROM image WHERE flower_id = ?");
                $get_img_count_query->execute(array($flower["id"]));
                $img_count = $get_img_count_query->fetch();

                echo("<p>" . $flower["name"] . "(počet obrázků: " . $img_count["num"] . ") " .
                "<form action=\"add_image.php\" method=\"post\"> " .
                "<input type=\"hidden\" name=\"flower_id\" value=\"". $flower["id"] . "\"/>" .
                "<input type=\"submit\" class=\"button\" value=\"Přidat atraktivní obrázek\"> </form></p>");
            }

    ?>
</body>
</html>