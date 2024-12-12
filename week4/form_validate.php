<!DOCTYPE html>
<html>
    <body>
        <?php
        if (isset($_GET["email"])){
            $email = $_GET["email"];

            if (empty($_GET["email"])) {
                echo("Email is required.");
            } elseif (!filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) {
                echo("Invalid email format.");
            }
        }
        if (isset($_GET["age"])){
            $age = $_GET["age"];

            if (empty($_GET["age"])) {
                echo("Age is required.");
            } elseif (!is_numeric($_GET["age"])) {
                echo("Invalid number.");
            } elseif ($_GET["age"] < 18 || $_GET["age"] > 100) {
                echo("Age must be between 18 to 100.");
            }
        }
        
        ?>
        <form name="user" action="<?php echo $_SERVER["PHP_SELF"];?>"  method="get">
        Name: <input type="text"name="name"><br>
        Email: <input type="text"name="email"><br>
        Age: <input type="text"name="age"><br>
        <input type="submit" value="Submit">
        </form>
    </body>
</html> 