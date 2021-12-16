<?php
    require '../config/config.php';
 
    $sql = "DELETE FROM category WHERE id='" . $_GET['editcat_id'] . "'";
 	$delete = $connect->query($sql);

    if ( $delete ) {
 
        echo "Record deleted successfully";
 
    } else {
     
        echo "Error deleting record ";
    }

    	header('location: Allcategories.php');

?>