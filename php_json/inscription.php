<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    $name = $_POST["name"];
    $firstname = $_POST["firstname"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];


    $jsonFile = "../data/users.json";
    if (!file_exists($jsonFile)) {
        file_put_contents($jsonFile, "[]");
    }


    $json = file_get_contents($jsonFile);
    $user_list = json_decode($json, true);

    foreach ($user_list as $user) {
        if ($user["mail"] === $mail) {
            header("Location: ../php_pages/connexion.php");
            exit();
        }
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


    $newUser = [
        "name" => $name,
        "firstname" => $firstname,
        "mail" => $mail,
        "password" => $hashedPassword,
        "role" => "User",
        "trips" => []
    ];

    $user_list[] = $newUser;


    file_put_contents($jsonFile, json_encode($user_list, JSON_PRETTY_PRINT));


    session_start();
    $_SESSION['firstname'] = $firstname;
    $_SESSION['name'] = $name;
    $_SESSION['mail'] = $mail;
    $_SESSION['role'] = "user";
    $_SESSION['password'] = $password;



    header("Location: ../php_pages/user.php");
    exit();
}
