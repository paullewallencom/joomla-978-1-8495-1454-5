<?php
	$_REQUEST['featured']='Y';
	ob_start();
	require_once(PAGEPATH.'shop.browse.php');
	$html=ob_get_contents();
	ob_end_clean();
	$html=str_replace('shop.browse','shop.featured',$html);
	echo $html;
?>
