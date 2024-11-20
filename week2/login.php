<!DOCTYPE html>
<html>
    <head>
        <style>
            body {background-color:sandybrown;}
        </style>
    </head>
    <body>
        <?php
        define("USERNAME", "wongjianbin0407");
        define("PASSWORD", "04072002");

        $inputUsername = "wongjianbin0407";
        $inputPassword = "04072002";

        if ($inputUsername == USERNAME && $inputPassword == PASSWORD) {
            echo "Login successful!";
        }
        elseif ($inputUsername != USERNAME) {
            echo "Invalid username.";
        }
        elseif ($inputPassword != PASSWORD) {
            echo "Invalid password.";
        }
        ?>

    </body>
</html>