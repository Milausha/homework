<?php
 if(isset($_POST['back']))
	{
		header("Location: registr.php");
	}
 		$data = File("registr.csv");
		if(!empty($data))
		{
			echo "<b><h2><left>Users and Admins</b></h2></left>";
			echo "<left><table bgcolor=Lightgrey border=2><tr>";
			$dat_arr = explode(";", $data[0]);
			echo "<tr ><td bgcolor=Cornsilk align=center  ><font size=2>Mail</td><td bgcolor=Cornsilk align=center ><font size=2>Name</td><td bgcolor=Cornsilk align=center ><font size=2>Password</td><td  bgcolor=Cornsilk align=center ><font size=2>Sex</td><td  bgcolor=Cornsilk align=center ><font size=2>Right</td></tr> \n";
			for ($p=0;$p<count($dat_arr);$p++) 
			{
				echo "<td bgcolor=Cornsilk><left><b>$dat_arr[$p]";
			}
			echo "</tr>";
			for ($i=1;$i<count($data);$i++) 
			{
				$data_array = explode(";", $data[$i]);
				echo "<tr>";
				for ($f=0;$f<count($data_array);$f++) 
				{ 
			      echo "<td bgcolor=Cornsilk><left><b>$data_array[$f]";
			    }
				echo "</tr>";
			}
			echo "</table></left>";
		}
		else 
			echo "file $data  does not exist";

		
		if(isset($_POST['submitButton']))
	{
		$data = fopen ( 'registr.csv', 'r' );
		$b=false;$n=1;
		unlink('registr2.csv');
		for($i=0; $info = fgetcsv ($data, 1000, ";"); $i++)
		{
			list($mail, $name, $pass, $pol,$right) = $info;
			if($_POST['q']==$n)
			{
				$b=true;
				if($_POST['Right']=='Admin')
				$info[4]='admin';
			    else
				$info[4]='user';			
			}			
			$hand = fopen("registr2.csv", "a");
			fputcsv($hand, $info,';');
			fclose($hand);
			$n++;
		}
		fclose ( $data );
		if($b==true)
		{
			unlink('registr.csv');		
			$file = fopen ( 'registr2.csv', 'r' );
			for($i=0; $newinfo = fgetcsv ($file, 1000, ";"); $i++)
			{
				list($mail, $name, $pass, $pol,$right) = $newinfo;
				$newhand = fopen("registr.csv", "a");
				fputcsv($newhand, $newinfo,';');
				fclose($newhand);
		    }
			fclose ( $file );	
		}			
	}		
?>
<html>
 <head>
  <title> Table of passwords </title>
 </head>
 <body>
 <body bgcolor=Cornsilk>
 <form action="tableofpasswords.php" method="post" name="form">
 
	  
	  Number of the user, whose rights you want to change:
	  <br><input type="number" name ="q" min="1"/><br><br/>
	  To whom want to change?  
     <select name="Right">
      <option value="Admin"   > To Admin  </option>
      <option value="User"    > To User  </option>
      </select><br><br />
	  <br><input type="submit" value ="Change user rights" name="submitButton"><br><br/>
	  <input type="submit" value ="back" name="back"><br><br>

	  
</form>
</body>
 </body>
</html>