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
<script src="./jquery.js" ></script>
<script type="text/javascript" src="./script/jquery.textarea.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<title><?php echo $titre_blog; ?> - Dashboard</title>
<style>
#signature {
    width: 100%;
    text-align: right;
    padding: 10px;
    color: #999;
}

</style>
</head>
<body >

<div id="body" >
<div id="top" >
<a href="./" ><span id="titre" >Dashboard</span></a><ul><li style="background: #343638;" >Éditer</li><li><a href="./post-form.php" >Poster</a></li>
<li style="cursor:pointer;position:absolute;top:0;right:0;z-index:10"><a id="file-open"  ><img src="./css/clip.png" height="21"></a></li>
</div>
<div id="liste" >
<ul id="liste-ul">
<li id="liste-titre">Tous les posts</li>

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
    
    
    $search = $_GET['r'];
    // Récupération des 10 derniers messages
   
     if ($_GET['r'] != '') {

    $reponse = $bdd->query("SELECT * FROM blog WHERE clef LIKE '%".$search."%' ORDER BY ID DESC");
        
    }

    if ($_GET['r'] == '') {
         $reponse = $bdd->query('SELECT titre, message, ID, date FROM blog ORDER BY ID DESC LIMIT 0, 100');
    }
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
 
    

    while ($donnees = $reponse->fetch())
    {
        
         
         $article_code = '<li class="li" id="'.htmlspecialchars($donnees['ID']).'" onclick="editer('.htmlspecialchars($donnees['ID']).')"  style="list-style: none;"><h1 >'.htmlspecialchars($donnees['titre']).'</h1><span class="date" >Posté le '.htmlspecialchars($donnees['date']).'</span></li>';
        
        
        
        echo $article_code;
       
        
       
    }

    $reponse->closeCursor();
    
    ?>
</ul>
</div>
<div id="content" >
<iframe id="frame" src="./post-page.php" ></iframe>
</div>
</div>

<!-- FILE MANAGER -->
<link href="http://hayageek.github.io/jQuery-Upload-File/uploadfile.min.css" rel="stylesheet">
<style>
	#file-manager {
		background: rgba(0,0,0,0.3);
		position: fixed;
		display:none;
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		z-index: 10000;
		top:0;
		left:0;
	}
	
	#file-manager table {
		width: 100%;
		height: 100%;
	}
	
	#file-manager-content {
		display: block;
		max-width: 700px;
		height:500px;
		margin: 0 auto;
		background: #fff;
		padding: 10px;
		box-shadow: 0 0 4px #777;
		border-radius: 3px;
	}
	
	#close {
		color: #000;
		font-size: 25px;
		float: right;
		margin: 7px 10px;
		cursor: pointer;
		top:0;
	}
	
	.ajax-upload-dragdrop {
	border: none;
	}
</style>

<div id="file-manager" >
<table><tr><td><div id="file-manager-content" >
<span id="close" >✕</span>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>


<div id="fileuploader">Upload</div>
<script>
$(document).ready(function()
{
	$("#fileuploader").uploadFile({
	url:"file-import.php",
	fileName:"myfile"
	});
});

$('#file-open').click(function(){
	$('#file-manager').fadeIn();
});

$('#close').click(function(){
	$('#file-manager').fadeOut();
});
</script>
</div></td></tr></table>
</div>
<!-- END FILE MANANGER -->

<script>
$("#liste").ready(function(){
	var hauteur = $(window).height() - 63;
	$("#liste").css("height",hauteur);
	$("#content").css("height",hauteur);
	$("iframe").css("height","100%");
});

$(window).resize(function(){
	var hauteur = $(window).height() - 63;
	$("#liste").css("height",hauteur);
	$("#content").css("height",hauteur);
	$("iframe").css("height","100%");
});

$(document).ready(function(){
    liste = document.getElementsByClassName("li")[0];
    liste.click();
});

function editer(num) {
	if (num != 0) {
		$("iframe").attr("src", "article.php?id=" + num);
		$("li").attr("class","li");
		$("#"+num).attr("class","li active");
	}
	
	else {
		window.location = "./";
	}
	
}

</script>
</body>
</html>