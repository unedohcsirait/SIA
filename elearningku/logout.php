<?php
session_start();
unset($_SESSION['guru']);
unset($_SESSION['siswa']);
header('location:../index.php');
?>