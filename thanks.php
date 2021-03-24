<?php

$errors = [];

if (empty($_POST["user_name"])) {
    $errors[] = "Name is required.";
} 

if (empty($_POST["user_firstname"])) {
    $errors[] = "Firstname is required.";
} 

if (empty($_POST["user_email"])) {
    $errors[] = "Email is required.";
} elseif (!filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format"; 
}

if (empty($_POST["user_phone"])) {
    $errors[] = "Phone number is required.";
} 

if (empty($_POST["subject"])) {
    $errors[] = "Subject is required.";
} 

if (!$errors) {  
    echo "<p>";
    echo "Merci " . $_POST["user_firstname"] . " " . $_POST["user_name"] . " de nous avoir contacté à propos de « " . $_POST["subject"] . " ».";
    echo "</p>" . PHP_EOL;
    echo "<p>";
    echo "Un de nos conseillers vous contactera soit à l'adresse " .  $_POST["user_email"] . " ou par téléphone au " . $_POST["user_phone"]  . " dans les plus brefs délais pour traiter votre demande :";
    echo "</p>" . PHP_EOL;
    echo $_POST["user_message"];
} else {
    foreach ($errors as $error) {
        echo '<p>' . $error . '</p>' . PHP_EOL;
    }
}