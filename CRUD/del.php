<?php
    $dbms='mysql';     
    $host='localhost'; 
    $dbName='crud';    
    $user='root';      
    $pass='';          
    $dsn="$dbms:host=$host;dbname=$dbName";
	
	$id=$_POST['id'];
    
    try {
        $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
		$sql = "DELETE FROM `account_info` WHERE `account_info`.`id` = '$id'";
		
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