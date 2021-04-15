<?php
	$json_url = "https://www.googleapis.com/urlshortener/v1/url?shortUrl=http://goo.gl/XpABHJ&projection=FULL";
	$json = file_get_contents($json_url);
	$data = json_decode($json, TRUE);
	$alltime = $data['analytics']['allTime'];
	
	/* Variables */
	$total = $alltime['referrers'];
	$pays = $alltime['countries'];
	$navigateurs = $alltime['browsers'];
	$plateformes = $alltime['platforms'];
	
	function afficher($Var) {
		echo "<pre>" . print_r($Var, true) . "</pre>";
	}
	
	afficher($total);
	
	?>

<?php
$month = $data['analytics']['month'];

/* Variables */
$total_month = $month['referrers'];
$pays_month = $month['countries'];
$navigateurs_month = $month['browsers'];
$plateformes_month = $month['platforms'];


afficher($total_month);

?>

<?php
$day = $data['analytics']['day'];

/* Variables */
$total_day = $day['referrers'];
$pays_day = $day['countries'];
$navigateurs_day = $day['browsers'];
$plateformes_day = $day['platforms'];

afficher($total_day);

?>

