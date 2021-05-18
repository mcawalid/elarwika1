<?php

// une fonction pour securiser les requette des injection SQL
if (!function_exists("GetSQLValueString")) 
{
	function GetSQLValueString($theValue, $theType,$base, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
  		if (PHP_VERSION < 6) {
    		$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  		}

  	$theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($base,$theValue) : mysqli_real_escape_string($base,$theValue);

  	switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  	}
  return $theValue;
}
}

	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
  		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}
?>