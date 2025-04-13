<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $email = htmlspecialchars(trim($_POST['mail']));


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Invalid email address.";
        exit;
    }

    date_default_timezone_set("Europe/London"); 
    $timestamp = date("Y-m-d_H-i-s");

    $safeName = preg_replace("/[^a-zA-Z0-9]/", "", $name);
    $filename = "form_" . $safeName . "_$timestamp.txt";

    $content = "Name: $name\nSurname: $surname\nEmail: $email\nDate: $timestamp";

    if (file_put_contents($filename, $content)) {
        echo "Saved";
    } else {
        http_response_code(500);
        echo "Error saving the form.";
    }
}
?>
