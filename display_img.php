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
            echo ("<h3 id = \"flower_name\" style=\"display:none;\">". $img["name"] ."</h3>");
            echo("<button id=\"button_show\" class=\"button\" onclick=\"onClick1()\">Zobrazit název</button>");
            echo("<button id=\"button_next\" style=\"display:none;\" class=\"button\" onclick=\"onClick2()\">Další rostlina</button>");

    ?>
    <script>
        function onClick1(){
            var flower_name = document.getElementById("flower_name");
            var button_next = document.getElementById("button_next");
            var button_show = document.getElementById("button_show");
            
            button_next.style.display = "block";
            button_show.style.display = "none";
            flower_name.style.display = "block";
        }

        function onClick2(){
            location.reload();
            return false;
        }
    </script>
</body>
</html>