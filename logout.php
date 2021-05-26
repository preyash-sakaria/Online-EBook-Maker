<?php
session_start();
include('connection.php');
session_destroy();
echo "<script>window.location.href = 'index.php';</script>";
?>