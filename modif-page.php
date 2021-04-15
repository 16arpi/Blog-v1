<?php 
$cookie = $_COOKIE['cook-blog'];
    if ($cookie != 'vale') {
        header('Location: ./connexion.php');
    }
?>
<?php include './config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" >
<meta name="robots" content="noindex, nofollow">
<link rel="icon" type="image/png" href="images/favicon.png" />
<script src="../jquery.js" ></script>
<script type="text/javascript" src="../script/jquery.textarea.js"></script>
<link rel="stylesheet" type="text/css" href="css/post.css" />
<title><?php echo $titre_blog; ?></title>
<style>
input[type=text] {
    border-left: 1px solid #DDD;
}
</style>
<?php
    
    if ($_GET["ok"] == "ok") {
        echo '<script>alert(\'Article modifié :D\');</script>';
    }
    
    else {
        echo '';
    }
    
    ?>
<?php 

  try
    {
        $bdd = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database, $mysql_user, $mysql_password);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    
    
    
    // Récupération des 10 derniers messages
   $search = $_GET['n'];
    // Récupération des 10 derniers messages
   
    $reponse = $bdd->query("SELECT * FROM blog WHERE ID LIKE '".$search."'");


 while ($donnees = $reponse->fetch())
    {
        $search = array('&lt;', '&gt;', '<music',);
        
        
        $final = array('<', '>',  '<audio controls ',);
         
         
        $article_code = '<form  action="./modifier.php" id="formF" name="formF" method="POST" ><input name="numero" type="hidden" value="'.htmlspecialchars($donnees['ID']).'"><table border="0"><tr><div id="check" style="position:fixed;top:5px;right:5px;padding: 6px 10px;"><a id="delete-a" href="./delete-article.php?number='.htmlspecialchars($donnees['ID']).'" >✕</a></div><td style="padding-right:0;" ><input type="text" style="border-left:0;" id="titre" name="titre" placeholder="Titre" autocomplete="off" class="input" value="'.htmlspecialchars($donnees['titre']).'" ></td><td><input type="text" id="clef" name="clef" placeholder="Mots clés (séparés par des virgules)" autocomplete="off" class="input" value="'.htmlspecialchars($donnees['clef']).'"  ></td></tr></table><textarea placeholder="Description" id="corp" name="article" class="input" autocomplete="off" >'.htmlspecialchars($donnees['message']).'</textarea><div id="options" >
<input type="button" id="subutton" class="bouton" value="Modifier" >
<input type="submit" id="submit" style="display:none;">
</div>
</form>';
     
$artcile = str_replace($search, $final, $article_code);
        echo str_replace($search, $final, $article_code);
    }
    
    $reponse->closeCursor();
    
    
    ?>
    
   
    
    <script>
    $("textarea").ready(function(){
    var hauteur = $(window).height() - 115;
    $("textarea").css("height", hauteur);
});

$(window).resize(function(){
    var hauteur = $(window).height() - 115;
    $("textarea").css("height", hauteur);
});

$('#subutton').click(function() {
    if ($('#titre').val().length == 0) {
        $('#titre').attr('placeholder','Il faut au moins insérez un titre');
    }
    
    else {
        $('#submit').click();
    }
});

$(document).ready(function(){
   		$("textarea").tabby();
   });
    </script>
    
     
</head>