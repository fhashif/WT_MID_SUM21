<?php
 
 $mark=75;
 if($mark>=90)
 {
	 echo"<h2>Student got A+</h2>";
 }
 else if($mark>=80 && $mark<90)
 {
	 echo"<h2>Student got A</h2>";
 }
 else if($mark>=70 && $mark<80)
 {
	 echo"<h2>Student got B</h2>";
 }
 else if($mark>=60 && $mark<70)
 {
	 echo"<h2>Student got C</h2>";
 }
 else
 {
	 echo"<h2>Student got F</h2>";
 }
?>