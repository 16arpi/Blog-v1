<?php 
$cookie = $_COOKIE['cook-blog'];
    if ($cookie != 'vale' || $_POST['mdp'] != '1usb2tu7') {
        header('Location: ./connexion.php');
    }
?>
<?php include './config.php'; ?>
<?php
    if ("1") {
    
    
    try
    {
        $bdd = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database, $mysql_user, $mysql_password);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    
    $search = array('"');
    
    
    $final = array('\"');
    
    /* Date de merde */
    $jour = date("d");
    $mois_num = date("m");
    $annee = date("Y");
    if ($mois_num == "01") {
        $date = $jour.' janvier '.$annee;
    }
    
    elseif ($mois_num == "02") {
        $date = $jour.' février '.$annee;
    }
    
    elseif ($mois_num == "03") {
        $date = $jour.' mars '.$annee;
    }
    
    elseif ($mois_num == "04") {
        $date = $jour.' avril '.$annee;
    }
    
    elseif ($mois_num == "05") {
        $date = $jour.' mai '.$annee;
    }
    
    elseif ($mois_num == "06") {
        $date = $jour.' juin '.$annee;
    }
    
    elseif ($mois_num == "07") {
        $date = $jour.' juillet '.$annee;
    }
    
    elseif ($mois_num == "08") {
        $date = $jour.' août '.$annee;
    }
    
    elseif ($mois_num == "09") {
        $date = $jour.' septembre '.$annee;
    }
    
    elseif ($mois_num == "10") {
        $date = $jour.' octobre '.$annee;
    }
    
    elseif ($moiss_num == "11") {
        $date = $jour.' novembre '.$annee;
    }
    
    elseif ($moi_num == "12") {
        $date = $jour.' décembre '.$annee;
    }
    
    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO blog (titre, message, clef, date) VALUES(?, ?, ?, ?)');
    $req->execute(array(str_replace($search, $final, $_POST['titre']), $_POST['corp'], $_POST['clef'], $date));
    
    
    
    
}

else {
    //header('Location: index.php?mdp=wrong');

}
    
    header('Location: post-page.php?ok=ok');
    ?>
    

Article Posté :D