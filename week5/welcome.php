<?php
session_start();
session_regenerate_id(true);

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

<head>

</head>

<body>
    <?php
    $timeout = 300;

    if (isset($_SESSION['LastActive'])) {
        $duration = time() - $_SESSION['LastActive'];
        if ($duration > $timeout) {
            session_regenerate_id(delete_old_session: true);
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit;
        }
    }
    $_SESSION['LastActive'] = time();

    echo 'Welcome! <br>';
    ?>
    <form action='logout.php' method='POST'>
        <button type='submit'>Log out</button>
    </form>
</body>

</html>