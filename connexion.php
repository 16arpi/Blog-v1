<html>
<head>
<meta charset="utf-8" >
<link rel="icon" type="image/png" href="../favicon.png" />
<script src="../jquery.js" ></script>
<link rel="stylesheet" type="text/css" href="./css/main-connect.css" media="screen" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<meta name="robots" content="noindex, nofollow">
<style>
</style>
<style>
@import url(http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300);

* {
	font-family: 'Roboto Slab', serif;
}

h1 {
	display: block;
	float: none;
	margin: 0 auto;
}
</style>
<title>César's Blog</title>
</head>

<div id="top" >
<div id="header" >
<center><a href="./" ><h1>César's blog</h1></a></center>
    
</div>
</div>
<div id="content"  >
<?php 
if ($_COOKIE['cook-blog'] == 'vale') {
    header('Location: index.php');
}
?>
<?php 
if ($_GET['mdp'] == 'mauvais') { echo '<span id="rouge">Erreur d\'authentification</span>';
} ?>
<form id="connect-f" action="connect.php" method="post" >
<input autocomplete="off" type="text" placeholder="Identifiant" name="pseudo" id="pseudo" >
<input type="password" placeholder="Mot de passe" name="pass" id="pass" >
<input type="submit" id="submit">
</form>
</div>

</div>
<script>
$('#pseudo').focus();
</script>
</body>
</html>