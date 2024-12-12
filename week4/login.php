<!DOCTYPE html>
<html>
    <head>
        <body>
            Login<br>
            <form action="" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username"><br>

            <label for="password">Password</label>
            <input type="text" name="password" id="password"><br>
            
            <button type="submit">Login</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if (empty($username)) {
                echo("Please enter your username.");
            }
            if (empty($password)) {
                echo("Please enter your password.");
            }
            if ($username === "admin" && $password === "1234") {
                echo("Login success!");
            } else {
                echo("Please try again.");
            }
        }
        ?>
        </body>
    </head>
</html>