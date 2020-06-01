<?php
    $dbms='mysql';     
    $host='localhost'; 
    $dbName='crud';    
    $user='root';      
    $pass='';          
    $dsn="$dbms:host=$host;dbname=$dbName";
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
    
    try {
        $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象

	    

		$sql = "INSERT INTO `user` (`name`, `email`, `phone`, `city`)VALUES('$name', '$email', '$phone', '$city')";
		
		
		if ($dbh->query($sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}

    } catch (PDOException $e) {
        die ("Error!: " . $e->getMessage() . "<br/>");
    }
	
	
	$dbh=NULL;
?>