<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['name'])) {

        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $name = $_POST['name'];


        $jsonFile = "../data/users.json";
        if (!file_exists($jsonFile)) {
            exit("Erreur : Fichier json n'existe pas");
        }

        $json = file_get_contents($jsonFile);
        $user_list = json_decode($json, true);


        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


        if ($_SESSION["mail"] === $mail) {

            foreach ($user_list as &$user) {

                if ($user["mail"] === $_SESSION["mail"]) {

                        $user["name"] = $name;
                        $user["firstname"] = $firstname;
                        $user["password"] = $hashedPassword;

                        $_SESSION["name"] = $name;
                        $_SESSION["firstname"] = $firstname;
                        $_SESSION["password"] = $password;
                        break;

                        /*
                        file_put_contents($jsonFile, json_encode($user, JSON_PRETTY_PRINT));
                        header("Location: ../php_pages/user.php");
                        exit();
                        */
                }
            }
        }
        else { // on change l'email

            foreach ($user_list as $index => $user) {

                if ($user["mail"] === $_SESSION["mail"]) {

                    //créer nouveaux compte avec nouveau mail + données
                    $newUser = [
                        "name" => $name,
                        "firstname" => $firstname,
                        "mail" => $mail,
                        "password" => $hashedPassword,
                        "role" => $user["role"],
                        "trips" => $user["trips"],
                    ];
                    $user_list[] = $newUser;

                    unset($user_list[$index]);

                    $_SESSION['mail'] = $mail;
                    $_SESSION['forename'] = $firstname;
                    $_SESSION['name'] = $name;
                    $_SESSION['password'] = $password;
                    break;
                }
            }
        }

        $user_list = array_values($user_list);
        file_put_contents($jsonFile, json_encode($user_list, JSON_PRETTY_PRINT));


        header("Location: ../php_pages/user.php");
        exit();
    }
}

/*

    SI IL CHANGE LE MAIL IL FAUT SUPRIMER SON COMPTE ACTUEL ET EN CREER UN NOUVEAU AVEC LE NOUVEAU MAIL
    SI IL CHANGE AUTRE CHOSE QUE LE MAIL IL FAUT UPDATE SON COMPTE

*/