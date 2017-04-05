<?php
//---------------------------mysql db connection ------------//

# give your own credentials here. 

$hostname='localhost';
$username='root';
$password='';

/* $hostname='localhost';
$username='ambicacl_vishal';
$password='@v$02581';
 */
try {
		//$dbh = new PDO("mysql:host=$hostname;dbname=ambicacl_appoinment",$username,$password);
        $dbh = new PDO("mysql:host=$hostname;dbname=appoinment",$username,$password);
//    echo 'Connected to Database<br/>';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
//---------------------------mysql db connection ------------//
/*
if($dbh){
	echo "connection successfully";
}
else{
	echo "connection faile";
}
*/
?>
