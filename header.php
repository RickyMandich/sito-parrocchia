<?php
session_start();
require_once "classi/Articolo.php";
require_once "classi/Utente.php";
$file = basename($_SERVER['PHP_SELF']);
$file = preg_replace('/\?.*/', '', $file);
$file = preg_replace('/\.php$/', '', $file);
$conn = new mysqli(hostname: "localhost",username: "santifrancescoechiara", database:"my_santifrancescoechiara", port:3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}