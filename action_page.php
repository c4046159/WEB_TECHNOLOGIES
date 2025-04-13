<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['mail']);

    date_default_timezone_set("Europe/London"); 
    $timestamp = date("Y-m-d_H-i-s");
    $filename = "form_" . preg_replace("/[^a-zA-Z0-9]/", "", $name) . "_$timestamp.txt";

    $content = "Name: $name\nSurname: $surname\nEmail: $email\nDate: $timestamp";

    file_put_contents($filename, $content);
    echo "Saved";
}
?>
