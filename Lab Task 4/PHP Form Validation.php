<?php
	$name="";
	$errorName="";
	$username="";
	$errorUserName="";
	$password="";
	$errorPassword="";
	$confirmPassword="";
	$errorConfirmPassword="";
	$email="";
	$errorEmail="";
	$code="";
	$errorCode="";
	$number="";
	$errorNumber="";
	$strtAddress="";
	$errorStrAdd="";
	$city="";
	$errorCity="";
	$state="";
	$errorState="";
	$postalCode="";
	$errorPC="";
	$birth_day="";
	$errorBD="";
	$birth_month="";
	$errorBM="";
	$birth_year="";
	$errorBY="";
	$gender="";
	$errorGender="";
	$reference=[];
	$errorReference="";
	$bio="";
	$errorBio="";
	
	$hasError=false;


    function Reference($r)
		{
			global $reference;
			
			foreach($reference as $ref)
			{
				if ($ref == $r)
				{return true;}
			}
			   return false;
	    }
    

    $birthDay=[];
	for($i=1;$i<32;$i++)
	{
		$birthDay[]=$i;
	}
	$birthMonth=["January","February","March","April","May","June","July","August","September","October","November","December"];
	$birthYear=[];
	for($i=1970;$i<2003;$i++)
	{
		$birthYear[]=$i;
	}

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
		if(empty($_POST["name"]))
		{
	     $errorName="Enter name";
		 $hasError=true;
		}
		else
		{
			$name=htmlspecialchars($_POST["name"]);
		}
		
		if(empty($_POST["username"]))
		{
	     $errorUserName="Enter username";
		 $hasError=true;
		}
		elseif(strpos($_POST["username"]," "))
		{
	     $errorUserName="Space not allowed";
		 $hasError=true;
		}
		elseif(strlen($_POST["username"])<6)
		{
	     $errorUserName="Username too short";
		 $hasError=true;
		}
		else
		{
			$username=htmlspecialchars($_POST["username"]);
		}
		
		
		if(empty($_POST["password"]))
		{
	     $errorPassword="Enter password";
		 $hasError=true;
		}
		elseif(strlen($_POST["password"])<8)
		{
	     $errorPassword="Password is too short";
		 $hasError=true;
		}
		elseif(!strpos($_POST["password"],"#") && !strpos($_POST["password"],"?"))
		{
	     $errorPassword="Password must contain special characters";
		 $hasError=true;
		}
		elseif(!strpos($_POST["password"],"#") && !strpos($_POST["password"],"?"))
		{
	     $errorPassword="Password must contain special characters";
		 $hasError=true;
		}
		else
		{
			$upperCase=false;
			$lowerCase=false;
			$chars = str_split($_POST["password"]);
			foreach ($chars as $c) 
			{
				if(ctype_upper($c))
				{
					$upperCase=true;
					break;
				}
            }
			foreach ($chars as $c) 
			{
				if(ctype_lower($c))
				{
					$lowerCase=true;
					break;
				}
            }
			if($upperCase==false)
			{
				$errorPassword="Password must contain one upper case letter";
				$hasError=true;
			}
			elseif($lowerCase==false)
			{
				$errorPassword="Password must contain one lower case letter";
				$hasError=true;
			}
			else
			{
			  $password=htmlspecialchars($_POST["password"]);	
			}
			
	    }
		
		
		if(empty($_POST["confirmPassword"]))
		{
	     $errorConfirmPassword="Confirm password";
		 $hasError=true;
		}
		elseif($_POST["confirmPassword"] != $_POST["password"])
		{
	     $errorConfirmPassword="Password does not match";
		 $hasError=true;
		}
		else
		{
			$confirmPassword=htmlspecialchars($_POST["confirmPassword"]);
		}
		
		
		if(empty($_POST["email"]))
		{
	     $errorEmail="Enter email";
		 $hasError=true;
		}
		elseif(!strpos($_POST["email"],"@"))
		{
	     $errorEmail="Email should contain @";
		 $hasError=true;
		}
		elseif(!strpos($_POST["email"],".",strpos($_POST["email"],"@")+1))
		{
	     $errorEmail="Email should contain a dot(.) after @";
		 $hasError=true;
		}
		else
		{
			$email=htmlspecialchars($_POST["email"]);
		}
		
		
		if(empty($_POST["code"]))
		{
	     $errorCode="Enter code";
		 $hasError=true;
		}
		elseif(!is_numeric($_POST["code"]))
		{
	     $errorCode="Numeric values required";
		 $hasError=true;
		}
		else
		{
			$code=htmlspecialchars($_POST["code"]);
		}
		if(empty($_POST["number"]))
		{
	     $errorNumber="Enter number";
		 $hasError=true;
		}
		elseif(!is_numeric($_POST["number"]))
		{
	     $errorNumber="Numeric values required";
		 $hasError=true;
		}
		else
		{
			$number=htmlspecialchars($_POST["number"]);
			
		}
		
		
		
		if(empty($_POST["strtAdd"]))
		{
	     $errorStrAdd="Enter street address";
		 $hasError=true;
		}
		else
		{
			$strtAddress=htmlspecialchars($_POST["strtAdd"]);
		}
		if(empty($_POST["city"]))
		{
	     $errorCity="Enter city";
		 $hasError=true;
		}
		else
		{
			$city=htmlspecialchars($_POST["city"]);
		}
		if(empty($_POST["state"]))
		{
	     $errorState="Enter state";
		 $hasError=true;
		}
		else
		{
			$state=htmlspecialchars($_POST["state"]);
		}
		if(empty($_POST["postalCode"]))
		{
	     $errorPC="Enter postal code";
		 $hasError=true;
		}
		else
		{
			$postalCode=htmlspecialchars($_POST["postalCode"]);
		}
		
		
		if(!isset($_POST["BirthDay"]))
		{
	     $errorBD="Select day";
		 $hasError=true;
		}
		else
		{
			$birth_day=htmlspecialchars($_POST["BirthDay"]);
		}
		if(!isset($_POST["BirthMonth"]))
		{
	     $errorBM="Select month";
		 $hasError=true;
		}
		else
		{
			$birth_month=htmlspecialchars($_POST["BirthMonth"]);
		}
		if(!isset($_POST["BirthYear"]))
		{
	     $errorBY="Select year";
		 $hasError=true;
		}
		else
		{
			$birth_year=htmlspecialchars($_POST["BirthYear"]);
		}
		
		
		
		if(!isset($_POST["gender"])){
			$hasError = true;
			$errorGender = "Select gender";
		}
		else{
			$gender = $_POST["gender"];
		}
		
		
		
		if(!isset($_POST["reference"]))
		{
			$hasError = true;
			$errorReference="Select an option(s)";
		}
		else
		{
			$reference = $_POST["reference"];
		}
		
		
		
		if(empty($_POST["bio"]))
		{
	     $errorBio="Enter bio";
		 $hasError=true;
		}
		else
		{
			$bio=htmlspecialchars($_POST["bio"]);
		}
		
		
		
		
		if($hasError==false)
		{
			echo htmlspecialchars($_POST["name"])."<br>";
		    echo htmlspecialchars($_POST["username"])."<br>";
			echo htmlspecialchars($_POST["password"])."<br>";
			echo htmlspecialchars($_POST["confirmPassword"])."<br>";
			echo htmlspecialchars($_POST["email"])."<br>";
			echo htmlspecialchars($_POST["code"])."-";
			echo htmlspecialchars($_POST["number"])."<br>";
			echo htmlspecialchars($_POST["strtAdd"])."<br>";
			echo htmlspecialchars($_POST["city"])." ";
			echo htmlspecialchars($_POST["state"])." ";
			echo htmlspecialchars($_POST["postalCode"])."<br>";
			echo htmlspecialchars($_POST["BirthDay"])." ";
			echo htmlspecialchars($_POST["BirthMonth"])." ";
			echo htmlspecialchars($_POST["BirthYear"])."<br>";
			echo htmlspecialchars($_POST["gender"])."<br>";
			$ref=$_POST["reference"];
			foreach($ref as $r)
			{echo "$r&nbsp;&nbsp;&nbsp;";}
			echo "<br>";
			echo htmlspecialchars($_POST["bio"]);
			
		}
    }
	

   




?>

<html>
<head>
 <title>
  PHP Form Validation
 </title>
</head>
 <body>
  <center>
	 <fieldset style="width:700px">
	  <legend align="center"><h1>Club Member Registration</h1></legend>
	  <form action="" method="post">
	   <table>
		<tr>
		 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 Name:</td>
		 <td><input type="text" name="name" value="<?php echo $name;?>"><span><?php echo $errorName;?></span></td>
		</tr>
		 <tr>
		 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 Username:</td>
		 <td><input type="text" name="username" value="<?php echo $username;?>"><span><?php echo $errorUserName;?></span></td>
		</tr>
		 <tr>
		 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 Password:</td>
		 <td><input type="password" name="password" value="<?php echo $password;?>"><span><?php echo $errorPassword;?></span></td>
		</tr>
		 <tr>
		 <td>Confirm Password:</td>
		 <td><input type="password" name="confirmPassword" value="<?php echo $confirmPassword;?>"><span><?php echo $errorConfirmPassword;?></span></td>
		</tr>
		 <tr>
		 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 Email:</td>
		 <td><input type="text" name="email" value="<?php echo $email;?>"><span><?php echo $errorEmail;?></span></td>
		</tr>
		<tr>
		 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 Phone:</td>
		 <td><input type="text" size="5" placeholder="Code" name="code" value="<?php echo $code;?>"><span><?php echo $errorCode;?></span> - <input type="text" size="7" placeholder="Number" name="number" value="<?php echo $number;?>"><span><?php echo $errorNumber;?></span></td>
		</tr>
		<tr>
		 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 Address:</td>
		 <td><input type="text" placeholder="Street Address" name="strtAdd" value="<?php echo $strtAddress;?>"><span><?php echo $errorStrAdd;?></span></td>
		</tr>
		<tr>
		 <td></td>
		 <td><input type="text" size="6" placeholder="City" name="city" value="<?php echo $city;?>"><span><?php echo $errorCity;?></span> - <input type="text" size="6" placeholder="State" name="state" value="<?php echo $state;?>"><span><?php echo $errorState;?></span></td>
		</tr>
		<tr>
		 <td></td>
		 <td><input type="text" placeholder="Postal/Zip Code" name="postalCode" value="<?php echo $postalCode;?>"><span><?php echo $errorPC;?></span></td>
		</tr>
			<tr>
		 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 Birth Date:</td>
		 <td>
		  <select name="BirthDay">
							<option selected disabled>Day</option>
							<?php
							    
								foreach($birthDay as $bD)
								{
								  if($bD==$birth_day)
								   {echo "<option selected>$bD</option>";}
							      else
								   {echo "<option>$bD</option>";}
							    }
								
							?>
		  </select><span><?php echo $errorBD;?></span>
		  <select name="BirthMonth" style="width:60px">
							<option selected disabled>Month</option>
							<?php
								foreach($birthMonth as $bM)
								{
								  if($bM==$birth_month)
								   {echo "<option selected>$bM</option>";}
							      else
								   {echo "<option>$bM</option>";}
								}
							?>
		  </select><span><?php echo $errorBM;?></span>
		    <select name="BirthYear">
							<option selected disabled>Year</option>
							<?php
								foreach($birthYear as $bY)
								{
								  if($bY==$birth_year)
								   {echo "<option selected>$bY</option>";}
							      else
								   {echo "<option>$bY</option>";}
								}
							?>
		  </select><span><?php echo $errorBY;?></span>
	     </td>
		</tr>
		<tr>
		 <td align="right">Gender:</td>
		 <td><input type="radio" name="gender" value="Male" <?php if($gender == "Male") echo "checked";?>>Male<input type="radio" name="gender" value="Female" <?php if($gender == "Female") echo "checked";?>>Female</td>
	    </tr>
		<tr>
		 <td></td>
		 <td>&nbsp;<span><?php echo $errorGender;?></span></td>
	    </tr>
		<tr>
		 <td align="right" rowspan="4">Where did you hear<br>about us?</td>
		 <td><input type="checkbox" value="A Friend or Colleague" name="reference[]" <?php if(Reference("A Friend or Colleague")) echo "checked";?>>A Friend or Colleague</td>
		 <td rowspan="4"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <?php echo $errorReference;?></span></td>
	    </tr>
		<tr>
		 <td><input type="checkbox" value="News Article" name="reference[]" <?php if(Reference("News Article")) echo "checked";?>>News Article</td>
	    </tr>
		<tr>
		 <td><input type="checkbox" value="Google" name="reference[]" <?php if(Reference("Google")) echo "checked";?>>Google</td>
	    </tr>
		<tr>
		 <td><input type="checkbox" value="Blog Post" name="reference[]" <?php if(Reference("Blog Post")) echo "checked";?>>Blog Post</td>
	    </tr>
		<tr>
		 <td align="right">Bio:</td>
		 <td><textarea name="bio"><?php echo $bio;?></textarea><br><input type="submit" value="Register"></td>
		 <td><h3><?php echo $errorBio;?></h3></td>
	    </tr>
	   </table>
	  </form>
	 </fieldset>
  </center>
 </body>
</html>