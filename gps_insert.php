<?php

require "gps_conn.php";



if($_POST["lat"] && $_POST["lng"]){
		$lat =	$_POST["lat"];  
		$lng =	$_POST["lng"];

		echo $lat."  ".$lng."--  ";
		$sql = "insert into gps(id,lat,lng,time) VALUES('',$lat,$lng,CURRENT_TIMESTAMP)";
		//$sql = "INSERT INTO gps (id,lat,lng,time) 
//VALUES ('',$lat,$lng,'')")
		$result = mysqli_query($conn, $sql);
		if($result>0){
			echo "insert success";
		}
		else{
		echo "insert failed";
		}

		//mysqli_stmt_close($result);

}
else{
	echo "No data received.";
}

//$mysqli->close();
?>