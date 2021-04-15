<?php 
$cookie = $_COOKIE['cook-blog'];
    if ($cookie != 'vale') {
        header('Location: ./connexion.php');
    }
?>
<!DOCTYPE> 
<html lang='fr'> 
<head> 
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<meta charset='utf-8' > 
<link rel='stylesheet' href='css/post.css' > 
<link rel='stylesheet' href='css/main.css' > 
<style>

body {
    margin: 0;
}
#content {
    position: relative;
    width: 950px;
    background: transparent;
    top: 0;
    left: 0;
    margin: 0 auto;
    
}

td {
    width: 48%;
    padding: 10px;
}

</style>
<script src="../jquery.js"></script>
<title>Statistiques</title> 
</head>

<body>
<div id="body" >
<div id="top" >
<span id="titre" >Dashboard</span>
<ul>
<li ><a href="./" >Éditer</a></li>
<li class="active" >Statistiques</li>
</div>
</div>

<div id="content" >
<table>
<tr>
<td><div class="chart check"  id='chart'></div> </td>
<td><div class="chart check" id='chart_day'></div> </td>
</tr><tr>
<td><div class="chart check" id='chart_week'></div>  </td>
<td><div class="chart check" id='pie'></div> </td>
</tr>
</table>
</div> 





</div>
</div>
 <script src='oocharts.js'></script>
 <script type="text/javascript">
 
 	window.onload = function(){
 
 		oo.setAPIKey("c12658dd9d0d60ad4f740acc20b187fba16c88f8");
 
 		oo.load(function(){
 
 			/* Timeline 1 Mois */
 			var timeline_mois = new oo.Timeline("87235810", "30d");
 
 			timeline_mois.addMetric("ga:visits", "Visits");
 
 			timeline_mois.addMetric("ga:newVisits", "New Visits");
 
 			timeline_mois.draw('chart');
 			
 			/* Timeline 1 Jour */
 			var timeline_day = new oo.Timeline("87235810", "3d");
 			
 			timeline_day.addMetric("ga:visits", "Visits");
 			
 			timeline_day.addMetric("ga:newVisits", "New Visits");
 			
 			timeline_day.draw('chart_day');
 			
 			/* Timeline 1 Semaine */
 			var timeline_week = new oo.Timeline("87235810", "7d");
 			
 			timeline_week.addMetric("ga:visits", "Visits");
 			
 			timeline_week.addMetric("ga:newVisits", "New Visits");
 			
 			timeline_week.draw('chart_week');
 			
 			/* Camembert */
 			var pie = new oo.Pie("87235810", "30d");
 			
 			pie.setMetric("ga:visits", "Visits");
 			pie.setDimension("ga:browser");
 			
 			pie.draw('pie');
 			
 
 		});
 	};
 
 
 </script>

</body> 
</html>