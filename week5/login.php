<?php
session_start();
session_regenerate_id(delete_old_session: true);

if (!isset($_SESSION['IPAddress']) || !isset($_SESSION['agent'])) {
    $_SESSION['IPAddress'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['agent'] = $_SERVER['HTTP_USER_AGENT'];
}
if ($_SESSION['IPAddress'] !== $_SERVER['REMOTE_ADDR'] || $_SESSION['agent'] !== $_SERVER['HTTP_USER_AGENT']) {
    session_unset();
    session_destroy();
    die('Session validation fail.');
}
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    if ((isset($_POST['name']) && (isset($_POST['password'])))) {
        if (empty($_POST['name'])) {
            echo 'Enter your username. <br>';
        }
        if (empty($_POST['password'])) {
            echo 'Enter your password. <br>';
        }
    }
    ?>
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
        Username: <input type='text' name='name'><br>
        Password: <input type='text' name='password'><br>
        <input type='submit'>
    </form>

    <?php
    $username = 'wong';
    $password = 'abcd';
    if (!empty($_POST['name'])) {
        if (!empty($_POST['password'])) {
            if ($_POST['name'] == $username && $_POST['password'] == $password) {
                session_regenerate_id(delete_old_session: true);
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("Location: welcome.php");
            } else if ($_POST['name'] != $username && $_POST['password'] == $password) {
                echo 'Your username is incorrect. Try again.';
            } else if ($_POST['name'] == $username && $_POST['password'] != $password) {
                echo 'Your password is incorrect. Try again.';
            } else {
                echo '<p>Your username and password are incorrect. Try again.</p>';
            }
        }
    }
    ?>
</body>

</html>