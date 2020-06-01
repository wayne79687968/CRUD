<?php
    $dbms='mysql';     
    $host='localhost'; 
    $dbName='crud';    
    $user='root';      
    $pass='';          
    $dsn="$dbms:host=$host;dbname=$dbName";
	
	$id=$_POST['id'];
	$account=strtolower($_POST['account']);
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$birthday=$_POST['birthday'];
	$email=$_POST['email'];
	$remark=$_POST['remark'];
    
    try {
        $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
		$sql = "UPDATE `account_info` SET `account` = '$account', `name` = '$name', `gender` = '$gender', `email` = '$email', `remark` = '$remark' WHERE `account_info`.`id` = $id";
		
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