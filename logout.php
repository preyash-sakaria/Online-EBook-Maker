<?php
session_start();
include('connection.php');
session_destroy();
echo "<script>
alert('You have successfully logged out');
window.location.href = 'index.php';</script>";

?>