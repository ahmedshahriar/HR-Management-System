<?php

	function DBconnection(){
		$conn= oci_connect('dj_khalid', 'kiki', 'localhost/XE');

		return $conn;
	}


?>