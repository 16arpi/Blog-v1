<?php 
$cookie = $_COOKIE['cook-blog'];
    if ($cookie != 'vale') {
        header('Location: ./connexion.php');
    }
?>
<?php include './config.php'; ?>
<!DOCTYPE html>

<html lang="fr">
<link rel="icon" type="image/png" href="../images/favicon.png" />
<head>
<meta charset="utf-8" >
<meta name="robots" content="noindex, nofollow">
<link rel="icon" type="image/png" href="images/favicon.png" />
<script src="../jquery.js" ></script>
<script type="text/javascript" src="../script/jquery.textarea.js"></script>
<link rel="stylesheet" type="text/css" href="css/options.css" />
<title><?php echo $titre_blog; ?> - Dashboard</title>
<style>
@import url(http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300);

body {
font-family: 'Roboto Slab', serif;
}
#signature {
    width: 100%;
    text-align: center;
    padding: 10px;
    color: #999;
}

iframe {
border:none;
width: 100%;
height: 100%;
}

#content {
padding: 0;
}
</style>
</head>
<body >
<div id="body" >
<div id="top" >
<a href="./" ><span id="titre" >Dashboard</span></a><ul><li><a href="./" >Éditer</a></li><li class="active">Poster</li><li style="cursor:pointer;position:absolute;top:0;right:0;z-index:10"><a id="file-open"  ><img src="./css/clip.png" height="21"></a></li></li>
</div>
<div id="content" >
<iframe src="post-page.php" ></iframe>
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
	
	.ajax-upload-dragdrop {
color: #dadce3;
text-align: left;
vertical-align: middle;
padding: 10px 10px 0 10px;
}

table span {
color: #dadce3;
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

$(window).ready(function(){
	var hauteur = $(window).height() - 65;
	$("#content").css("height",hauteur);
	
});
$(window).resize(function(){
	var hauteur = $(window).height() - 65;
	$("#content").css("height",hauteur);
	
});
</script>
</body>
</html>