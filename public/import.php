<?php
include 'db.php';
if(isset($_POST["Import"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	    
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into patients (`hsc_id`, `rch_id`, `anc_number`, `ec_reg_date`,financial_year, `an_mother`,`husband_name`,`address`,`whom_mobile`,`mobile`,`husband_mobile`,`living_children`,`cast`,`religion`,`dob`,`gravida`,`para`,`pw_height`,`mother_weight`,`bp_systolic`,`bp_diastolic`,`bpl_apl`,`last_visit_date_ec_tracking`,`an_reg_date`,`age`,`created_at`,`updated_at`) 
	            	
					values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]','$emapData[15]'	,'$emapData[16]','$emapData[17]','$emapData[18]','$emapData[19]','$emapData[20]','$emapData[21]','$emapData[22]','$emapData[23]','$emapData[24]','$emapData[25]','$emapData[26]','$emapData[27]')";
	        
			//we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql );
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
	        
			 

			 //close of connection
			mysqli_close($conn); 
				
		 	
			
		 }
	}	 
?>		 