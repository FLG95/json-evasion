<?php


if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    if (isset($_POST['mail']) && isset($_POST['password'])) {

        $mail = $_POST["mail"];
        $password = $_POST["password"];

        $jsonFile = "../data/users.json";
        if (!file_exists($jsonFile)) {
            exit();
        }

        $json = file_get_contents($jsonFile);
        $user_list = json_decode($json, true);


        foreach ($user_list as $user) {


            if ($user["mail"] === $mail) {

                if(password_verify($password, $user["password"])) {

                    session_start();
                    $_SESSION["name"] = $user["name"];
                    $_SESSION["firstname"] = $user["firstname"];
                    $_SESSION["mail"] = $user["mail"];
                    $_SESSION["password"] = $password;
                    $_SESSION["role"] = $user["role"];
                    $_SESSION["trips"] = $user["trips"];

                    header("Location: ../php_pages/user.php");
                    exit();
                }
            }
        }
        header("Location: ../php_pages/connexion.php");
        exit();
    }
}