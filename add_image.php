<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Přidat obrazek</title>
</head>
<body>
    <?php
        echo(
        "<form action=\"add_image_result.php\" method=\"post\"> " .
        "<input type=\"hidden\" name=\"flower_id\" value=\"". $_POST["flower_id"] . "\"/>" .
        "<input type=\"text\" name=\"url\" class=\"textinput\">" .
        "<input type=\"submit\" class=\"button\" value=\"Přidat atraktivní obrázek\"> </form>"
        );
    ?>
</body>
</html>