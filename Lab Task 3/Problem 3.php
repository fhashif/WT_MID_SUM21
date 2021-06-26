<?php

 $length=5;
 $width=3;
 $perimeter=$length+$width;
 $area=$length*$width;
 if($length===$width)
 {
	 echo "<h2>Perimeter: $perimeter<br>Area:$area<br><b>The shape is a square</b></h2>";
 }
  else
 {
	 echo "<h2>Perimeter: $perimeter<br>Area:$area</h2>";
 }
?>