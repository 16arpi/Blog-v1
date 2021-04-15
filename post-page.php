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
</head>
<?php
    
    if ($_GET["ok"] == "ok") {
        echo '<script>alert(\'Article posté :D\');</script>';
    }
    
    else {
        echo '';
    }
    
    ?>

<body>
<form action="./post.php" id="formF" name="formF" enctype="multipart/form-data" method="POST" >   
<input type="hidden" name="mdp" value="1usb2tu7" >    
<input type="file" style="display:none;" name="upload" class="file_un" id="file"  >
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
<table border="0"><tr><td >
<input type="text" id="titre" name="titre" placeholder="Titre" autocomplete="off" class="input"  ></td><td><input type="text" style="border-left: 1px solid #eee;" id="clef" name="clef" placeholder="Mots clés (séparés par des virgules)" autocomplete="off" class="input"  >
</td></tr></table>
<textarea placeholder="Description" id="corp" name="corp" class="input" autocomplete="off" ></textarea>
<div id="options" >
<input type="button" id="subutton" class="bouton" value="Poster" >

<input type="submit" id="submit-post" style="display:none;">
</div>
</form>

<script>
$('#checkbox').change(function(){
    if ($('#checkbox').prop('checked')) {
        $('#formF').attr('action','upfile.php');
        $("#corp").prop('disabled', true);
        $("#clef").prop('disabled', true);
        $("#titre").prop('disabled', true);
    }
    
    else {
     $('#formF').attr('action','post.php');
        $("#corp").prop('disabled', false);
        $("#clef").prop('disabled', false);
        $("#titre").prop('disabled', false);   
    }
});

$('#file').change(function(){
    var filename = $('#file').val().split('\\').pop();
    $('#fichier').attr('value', filename);
});
    
$('#fichier').click(function(){
    $('#file').click();
});
    
$('#subutton').click(function() {
    if ($('#checkbox').prop('checked')) {
        $('#submit-post').click();
    }
    
    else {
    if ($('#titre').val().length == 0) {
        $('#titre').attr('placeholder','Il faut au moins insérez un titre');
    }
    
    else {
        $('#submit-post').click();
    }
        
    }
});
    
    
    
// Retour au autres trucs    
function deleteart(numero) {
    var r=confirm("Vous êtes sûrs de votre choix ?");
    if (r==true)
    {
        window.location = './delete-article.php?number=' + numero;
    }
    else
    {
        return false;
    }
    
}

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
</body>
</html>