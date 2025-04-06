<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $to = "Carlos.Pizarro@student.shu.ac.uk";

    $subject = "New Form Subscriber";

    $message = "A new subscription from:\n\n";
    $message .= "Name: $name\n";
    $message .= "Name: $surname\n";  
    $message .= "Email: $email\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<h2>Thank you! Your submission has been sent.</h2>";
    } else {
        echo "<h2>Sorry, there was a problem sending your message.</h2>";
    }
} else {
    echo "<p>No data submitted.</p>";
}
?>
