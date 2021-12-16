<?php
    require '../config/config.php';
 
    $sql = "DELETE FROM news WHERE id='" . $_GET['news_id'] . "'";
 	$delete = $connect->query($sql);

    if ( $delete ) {
 
        echo "Record deleted successfully";
 
    } else {
     
        echo "Error deleting record ";
    }

    	header('location: allnews.php');

?>