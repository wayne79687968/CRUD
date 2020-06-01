<?php
    $dbms='mysql';     
    $host='localhost'; 
    $dbName='crud';    
    $user='root';      
    $pass='';          
    $dsn="$dbms:host=$host;dbname=$dbName";
	
	$account=strtolower($_POST['account']);
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$birthday=$_POST['birthday'];
	$email=$_POST['email'];
	$remark=$_POST['remark'];
    
    try {
        $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
		$sql = "INSERT INTO `account_info` (`id`, `account`, `name`, `gender`, `birthday`, `email`, `remark`)VALUES(NULL, '$account', '$name', '$gender', '$birthday', '$email', '$remark')";
		
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