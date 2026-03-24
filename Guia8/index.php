<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: welcome.php");
} else {
    header("Location: login.php");
}