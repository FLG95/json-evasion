<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>S'inscrire</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <meta charset="UTF-8">
</head>
<body>

    <?php
    require_once "../php_pages/header.php";
    ?>


<form method="POST" action="../php_json/inscription.php">
    <table>
        <tr>
            <th colspan="2">Inscription</th>
        </tr>
        <tr>
            <td><input id="firstname" name="firstname" type="text" placeholder="Prénom" required></td>
        </tr>
        <tr>
            <td><input id="name" name="name" type="text" placeholder="Nom" required></td>
        </tr>

        <tr>
            <td><input id="mail" name="mail" type="email" placeholder="e-mail@gmail.com" required></td>
        </tr>
        <tr>
            <td><input id="password" name="password" type="password" placeholder="Mot de passe" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Inscription</button>
                <button type="reset">Réinitialiser</button>
            </td>
        </tr>
        <tr>
            <td colspan="2">Déjà un compte ? <a href="connexion.php">Connectez-vous</a></td>
        </tr>

    </table>
</form>


<footer>
    <div class="footer-container">
      <div class="contact" >
        <a href="../php_pages/contact.php" class="footer-contact">Nous contacter</a>
        <a href="about-us.php" class="footer-contact">Qui sommes-nous ?</a>
      </div>
      <div class="socials">
        <div>Nos réseaux : </div>
        <a class="twitter-logo" href="https://x.com/?mx=2" target="_blank"><img  src="../image/twitter-logo.png" alt="twitter-logo"></a>
        <a class="instagram-logo" href="https://www.instagram.com/" target="_blank"><img src="../image/instagram-logo.png" alt="instagram-logo.png"></a>
      </div>
    </div>
  </footer>


</body>
<script src="exo2.js"></script>
</html>