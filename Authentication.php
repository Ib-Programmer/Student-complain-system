<?php
session_start();

if (!isset($_SESSION['Name'])) {
    header("Location: Login.php");

}
?>