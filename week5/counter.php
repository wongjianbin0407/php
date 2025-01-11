<?php
session_start();

if (isset($_SESSION['visitcount'])) {
    $_SESSION['visitcount']++;
} else {
    $_SESSION['visitcount'] = 1;
}
$visitcount = $_SESSION['visitcount'];
echo '<p>Welcome to this page!';
echo '<p>The time you have visited ' .
    $visitcount . ' times.</p>';
