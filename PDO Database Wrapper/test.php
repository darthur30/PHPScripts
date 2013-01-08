<?php 

namespace test;
require_once('databasePHP.php');

use \DatabaseConnection\DB as DB;
use PDO;



$myVar = new DB();
$myVar->init()->retrieve();

print($myVar->getInfo());
print_r( json_encode($myVar->getResults()) );

//$myVar->update(1, 'one', 'CHANGED-URL');   YATTA
//$myVar->retrieve(2);                       YATTA
//$myVar->retrieve();                        YATTA
//$myVar->create(3, 'third','google');       YATTA
$myVar->delete(3);


//print(json_encode(array('one' => 1, 'two'=>2, 'three'=> 3)) );

//foreach($myVar->getResults() as $one){ foreach($one as $single){print_r($single . "<br />");} }


//$myVar->retrieve("select * from documents");//.print();

//echo "The \$myVar obj is: \n";
//print_r($myVar);
//echo "<br /><br />And also: ";

//print($myVar->getInfo());
//$myVar->retrieve("select * from documents"); 
//print($myVar->results); 



	/**


		$arr = array();
	
		$con = new PDO("mysql:host=localhost;dbname=darthur_Critique", "darthur_critique", "924H67D3b624wy2");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		
	


	
		$query = $con->prepare("select * from documents");
		$query->execute();  
			
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$arr[] = $row;
			}
	
		
		//print_r($arr);
		
		
		foreach($arr as $one){ foreach($one as $single){print($single . "<br />");} }
		
		//print($arr[0][image_url]);
		
	**/
		
?>