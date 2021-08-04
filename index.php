<html>
	<head>
		<title>	PHP Test Page </title>		
	</head>

	<body>
		PHP test <br>
		<?php
	                echo date('Y/m/d');
			echo "<br>";
			echo "This is from the server";
			echo "<br>";

			//PDO to mysql access
			$host = 	'localhost';
			$dbname = 	'TestDB';
			$usr = 		'root';
			$pwd = 		'foremost906';
			$dsn = 'mysql:host=$host;port=3306;dbname=$dbname';

			$Query = "Create table Test_tbl1(
					Test_ID MEDIUMINT auto_increment Primary key,
					Test_Picture mediumblob,
					Test_date Date,
					Test_Name_text varchar(255),
					Test_endDate Date
					)";

			$Q0 = "show databases";
			$Q1 = "insert into Test_tbl1 (Test_date, Test_Name_text) values(date_add(curdate(),interval -3 day),'Peter Doe')";
			$Dq = "delete from Test_tbl1 where Test_Name_Text= 'Peter Doe'";
			$insert0 ="insert into Test_tbl1 (Test_date, Test_Name_text, Test_Picture) values(curdate(), 'Peter Walsh', 'https://en.wikipedia.org/wiki/Superman#/media/File:Supermanflying.png')";
			$insert1 ="insert into Test_tbl1 (Test_date, Test_Name_text, Test_Picture) values(curdate(), 'Judy Walter', 'https://en.wikipedia.org/wiki/Wonder_Woman#/media/File:Wonder_Woman.jpg')";
			$getData = "select * from Test_tbl1 where Test_Name_text = 'Peter Walsh'";
			echo "starting mysqli";echo "<br>";
			//--------------------mysqio--------------------------------------
			//connecting to DB
			$sql1 = new mysqli('localhost','root','foremost906',$dbname);

			if($sql1->connect_errno){
				die( "failed to connect to Mysql: ". $sql1->connect_error);
			
			}
			echo "connection success"; echo "<br>";
/*	
			//creating Table ----------------------------------------------------
			if($sql1->query($Query)=== True){
				echo "createad tables\n"; echo "<br>";
			}else {
				echo "error creating table: " .$sql1->error; echo "<br>";
			}
*/	
/*			//inserting data into the table---------------------------------------
			if($sql1->query($insert1) ===True){
				echo "inserted data to tables\n"; echo "<br>";
			}else {
				echo "error inserting data to table: " .$sql1->error; echo "<br>";
			}
*/

			if($result = $sql1->query($getData) ){
                                echo"got data from the table"; echo"<br>";
				while($row = $result->fetch_assoc()){
					echo"ID: " . $row["Test_ID"].
					    "Name: " . $row["Test_Name_text"].
					    "Date: " . $row["Test_date"] .
					    "Picture: " . $row["Test_Picture"];
					echo "<br>";
				//	print $row["Test_Picture"];
					$img = "https://en.wikipedia.org/wiki/Superman#/media/File:Supermanflying.png";
					$path = "/home/njoadmin/Downloads/Supermanflying.png";

//					header('Content-type: image/jpeg');
//					echo file_get_contents($img));
//					$src = mime_content_type($img);

					echo "<img src= $path>";
					$filename = "/home/njoadmin/Downloads/Supermanflying.png";
					if(file_exists($filename)){
						echo "the file $filename exists";
					}else{
						echo "the file $filename doesn't exists";
					}
					echo getcwd(). "\n";




				}
			 }else {
                                echo "error geting data from table: " .$sql1->error; echo "<br>";
                        }



/*
			//deleting data from the table----------------------------------------
			if($sql1->query($Dq) ===True){
				echo"deleted data from the table"; echo"<br>";
			}else {
				echo "error deleting data from table: " .$sql1->error; echo "<br>";
			}
*/

			$sql1 -> close();





		      // $pdo = new PDO($dsn, $usr, $pwd);
                       //$pdo->query($Query);

		/*	
			try {
				$pdo = new PDO($dsn, $usr, $pwd);
				if($pdo) {
					echo "Connected to the mysql DB";
				$pdo->query($Query);
				}
			}catch (PDOException $e){
				echo $e ->getMessage();
			}
			echo "<br>";

		*/


		?>


	</body>






</html>
