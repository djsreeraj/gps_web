<!DOCTYPE html>
<html>
<head>

<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var j=0;
var p = new Array();
var q = new Array();

<?php
	require "gps_conn.php";
	$p_index=0;
	$q_index=0;
	$mysql_qry="select * from gps";
	$result=mysqli_query($conn,$mysql_qry);
while($row = mysqli_fetch_array($result))
	{
	//echo j+"-";
	$a=$row['lat'];
	$b=$row['lng'];

?>	
	 p[<?php echo $p_index; $p_index++;?>] =<?php echo $a;?>;  q[<?php echo $q_index; $q_index++;?>] =<?php echo $b;?>; 
	//j++;
	<?php
}
?>
//j=0;

var myCenter=new google.maps.LatLng(p[j],q[j]);
function initialize()
{
	
	var mapProp = {
 	 center:myCenter,
 	 zoom:15,
	 mapTypeId:google.maps.MapTypeId.ROADMAP 
	};
	
	var map =new google.maps.Map(document.getElementById("googleMap"),mapProp);
	
	var marker =new google.maps.Marker({
 	 position:myCenter, icon:'http://bit.ly/nmitbus2', map:map
  	});
	
	marker.setMap(map);
	moveMarker(map, marker);
}
var a,b;
	function moveMarker(map, marker){
			//alert("reach1");
		    var i=0, times=1900;
		    function timer(){
		    	j++;
				a=p[j];
				b=q[j];
				map.panTo(new google.maps.LatLng(a,b));
				marker.setPosition(new google.maps.LatLng(a,b));		
				i++;
				if(i==1339)
					alert("Limit reached");
				if(i<times){
			 		setTimeout(timer,50);
				}
				
			}
		    timer();
	};
	
google.maps.event.addDomListener(window, 'load', initialize);
//initialize();
</script>
</head>
<body>
<div id="googleMap" style="width:902px;height:605px;"></div>
</body>
</html>