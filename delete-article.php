<?php 
$cookie = $_COOKIE['cook-blog'];
    if ($cookie != 'vale') {
        header('Location: ./connexion.php');
    }
?>
<?php include './config.php'; ?>
<?php 
$con=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    mysqli_query($con,"DELETE FROM blog WHERE ID='".$_GET['number']."'");
    
    mysqli_close($con);
    
    //header('Location: index.php');


?>
<script>
//document.location.href = 'index.php';
</script>

<p><b>L'article a été supprimmé avec succès</b></p>
<script>
//document.location.href = 'index.php';
window.close();
</script>