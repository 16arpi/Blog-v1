<?php include './config.php'; ?>
<?php
$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];


if ($pseudo == $main_pseudo AND $pass == $main_password) {
    setcookie('cook-blog', 'vale', time() + 86400);
    header('Location: ./');
}

else {

header('Location: connexion.php?mdp=mauvais');
    
}

?>