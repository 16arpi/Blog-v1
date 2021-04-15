<?php include './config.php'; ?>
<?
$search = $_GET['r'];
if (preg_match("/^[$](.+)$/",$search)) {
			$remplacement = preg_replace("/^[$]/","",$search);
			header('Location: https://www.google.fr/search?q='.$remplacement);
		}
		
		else {
			echo '';
		}
?>
<?php
    // Connexion à la base de données

   try
    {
        $bdd = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database, $mysql_user, $mysql_password);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    
    
    
    // Récupération des 10 derniers messages
    $reponse = $bdd->query("SELECT * FROM blog WHERE ID LIKE ".$_GET['id']);
    $reponsee = $bdd->query("SELECT * FROM blog ORDER BY ID DESC LIMIT 0, 10");
    
    ?>
<html>
<head>

<meta charset="utf-8" >
<link rel="icon" type="image/png" href="../images/favicon.png" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<script src="../jquery.js" ></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-539b65050c66851a"></script>
<link rel="stylesheet" type="text/css" href="./css/ghost-minimaliste-article.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
<meta name="robots" content="noindex, nofollow">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51844400-1', 'cesarweb.me');
  ga('send', 'pageview');

</script>
<link href="../prettify/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../prettify/prettify.js"></script>
<script type="text/javascript" src="../script/jquery.textarea.js"></script>

<link rel="stylesheet" href="../script/menu/menu.css" >

<title><?php echo $titre_blog; ?></title>
<style>

@-webkit-keyframes bardessus {
    from {
        opacity: 1;
    }
    to {
        opacity: 1;
    }

/* Background */
}
#signature {
    
    text-align: center;
    padding: 10px;
    color: #999;
}



#liste-ul li:first-child {
    margin-top: 20px;
}

.day-color {
    background: <?php echo $couleur; ?>;
}

@media (max-width: 500px) {

iframe {
    max-width: 100%;
}

}

#content {
max-width: 100%;
}

.li {
max-width: 100%;
}

.li-content img {
    display: block;
    width: 100%;
    margin: 0 0;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 4px;
}

#bar a {
    color: #999;
    text-decoration: none;
    display: inline-block;
    margin-right: 10px;
    text-align: right;
}

#bar {
font-family: 'Roboto Slab', serif;
    background: rgba(255,255,255,1);
border-bottom: 1px solid #ddd;
    padding: 10px 10px 10px 10px;
    
    color: #999;
    text-align: right;
    position: fixed;
    top: 0;
    left: 0;
    width: calc(100% - 20px);
}

#content {
margin-top: 60px;
}


#titre-ap {
    position: fixed;
    top: 12px;
    left: 10px;
}
</style>
</head>
<body onload="prettyPrint()" >

<div id="content" >
<ul id="liste-ul" >

    <?



    while ($donnees = $reponse->fetch())
    {
        $search = array(':-D', ':-)', '<music', '&quot;', '£', '&amp;lt;', '&amp;gt;', '<code', 'images/');


        $final = array('<span style="font-size: 35px;">☺</span>', '<span style="font-size: 35px;">☺</span>', '<audio controls ', '"', '<br/>', '&lt;', '&gt;', '<code class="prettyprint"', '../images/');

         if ($_COOKIE['cook-blog'] == 'vale') {
    $option = '<span id="infos" ><a onclick="editer('.htmlspecialchars($donnees['ID']).')" ><img style="width:25px;" id="set" src="images/settings.png" ></a></span>';
    $option = '';
    }

    else {
        $option = '';
    }
    
    $verif = ($donnees['message'] != null) ? true : false;
    $keywords = '<span style="margin-left: 0;" class="keywords" >'.preg_replace("/,/", "</span><span class=\"keywords\">", $donnees['clef'].'</span>');

    require_once './Michelf/Markdown.inc.php';
    $my_html = \Michelf\Markdown::defaultTransform($donnees['message']);
    
    
    
        $date = htmlspecialchars($donnees['date']);
        $script = $donnees['ID'];
         $article_code = '<li class="li" id="'.htmlspecialchars($donnees['ID']).'" style="list-style: none;"><div class="li-header">'.$option.'<table><tr><td>'.$avatar.'</td><td><h1 class="titlen" ><a href="article.php?id='.htmlspecialchars($donnees['ID']).'" >'.htmlspecialchars($donnees['titre']).'</a></h1><span class="date" >Posté par <a style="color:#666;">César</a> le '.$date.'</td></tr></table></div><div class="li-content">'.$my_html.'<br/><div id="separator" ></div></li>';


        $artcile = str_replace($search, $final, $article_code);
        echo str_replace($search, $final, $article_code);
        

    }

    $reponse->closeCursor();

    ?>
    <? if ($verif == true) { ?>
   

<? } else { echo '<li class="li" style="border:none;margin-bottom:50px;"><div id="li-content" ><h2>“ Houston, on a un problème !!! ”</h2><p>Cette page n\'existe pas ou plus... La page d\'accueil, <a href="./" >c\'est par ici</a>.</div></li>'; } ?>
</ul>




</div>
</div>
<div id="poster" >
</div>

    
<script src="script/menu/menu.js" ></script>

<div id="bar" >
<span id="titre-ap" >Aperçu</span>
<a href="modif-page.php?n=<? echo $script; ?>" id="edit" >Editer</a><a href="./delete-article.php?number=<? echo $script; ?>" id="supp" >Supprimer</a>
</div>

<!--<script src="main.js" ></script>-->
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

function montrer(){
    if($("#formF").css("display") == "block"){
    $('#formF').css('display','none');
    $('#close').css('display','none');
    $('#post-window').css('width','137px');
    }
    else {
    $('#formF').css('display','block');
    $('#close').css('display','block');
    $('#post-window').css('width','540px');
    }
}

function montrer_edit(){
    if($("#edit-window").css("display") == "block"){
    $('#edit-window').css('display','none');
    }
    else {
    $('#edit-window').css('display','block');
    }
}

$('#file').change(function(){
    var filename = $('#file').val().split('\\').pop();
    $('#fichier').attr('value', filename);
});

$('#fichier').click(function(){
    $('#file').click();
});

$('#subutton').click(function() {
    if ($('#checkbox').prop('checked')) {
        $('#submit').click();
    }

    else {
    if ($('#titre').val().length == 0) {
        $('#titre').attr('placeholder','Il faut au moins insérez un titre');
    }

    else {
        $('#submit').click();
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

function editer(num) {
    montrer_edit();
    $('#edit-frame').attr('src','./post-test.php?n=' + num);
}

$('#edit-frame').change(function(){
    if ($('#edit-frame').contents().get(0).location.href.indexOf("modifier.php") >= 0)     {
        alert('Hello');
    }
});

    $('#logout').click(function(){
        document.location.href = 'deconnect.php';
    });
    


    function detruire() {
     javascript:var KICKASSVERSION='2.0';var s = document.createElement('script');s.type='text/javascript';document.body.appendChild(s);s.src='//hi.kickassapp.com/kickass.js';void(0);
 }
 
 $(document).keyup(function(e) {
 
   if (e.keyCode == 27) { 
       detruire();
       }   // esc
 });

   
   $("#menu_icon").click(function(){
        $('#menu_ul').css('display','block');    
   });
   
   $("#menu_ul").mouseleave(function(){
        $('#menu_ul').css('display','none');
   });
   
   $('.keywords').click(function(){
   		var url = './?r='+this.innerHTML;
   		window.location.href = url;
   });


   
</script>



</body>
</html>