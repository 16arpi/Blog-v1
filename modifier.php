<?php 
$cookie = $_COOKIE['cook-blog'];
    if ($cookie != 'vale') {
        header('Location: ./connexion.php');
    }
?>
<?php include './config.php'; ?>
<?php

    $numero = $_POST["numero"];
    $titree = $_POST["titre"];
    $articlee = $_POST["article"];
    $clef = $_POST["clef"];
 $con=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);
 // Check connection
 if (mysqli_connect_errno())
 {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 
    $search = array('"');
    
    
    $final = array('\'');

    mysqli_query($con,'UPDATE blog SET clef="'.$clef.'", titre="'.$titree.'", message="'.str_replace($search, $final, $articlee).'" WHERE  ID='.$numero);
    // mysqli_query($con,"UPDATE  `cesarbd`.`blog` SET  `titre` =  'Coucou les', `message` =  'coucou tout le' WHERE  `blog`.`ID` =8;");
              
              mysqli_close($con);
    
    header('Location: modif-page.php?n='.$numero.'&ok=ok');
              
?>
<script>
//document.location.href = 'index.php';
window.close();
</script>

<meta charset="utf-8" >
<link rel="stylesheet" href="css/post.css" >
    <style>
    span {
    display: inline-block;
    margin: 4px 0 0 3px
    }
    </style>
<span id="check">L'article a bien été modifié :D</span>

