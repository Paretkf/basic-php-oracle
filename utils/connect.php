<?php
	$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 202.44.47.68)(PORT = 1521)))(CONNECT_DATA=(SID=oraclesv1)))";
	$objConnect = oci_connect("6006021420054","6006021420054", $db, 'AL32UTF8');
	// if (!$objConnect) {
	// 	echo 'Failed to connect to Oracle';
	// } else {
	// 	echo 'Succesfully connected with Oracle DB';
	// }
	// oci_close($objConnect);
?>