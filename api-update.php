<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include "connection.php";



$data = json_decode(file_get_contents("php://input"),true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$age = $data['sage'];
$city = $data['scity'];

$result = $obj->query("UPDATE student SET `name`='$name',age='$age',city='$city' WHERE id='$id'");

if($result)
{
    echo json_encode(array('message'=>'Student Record Updated','status'=>true));
}
else
{
    echo json_encode(array('message'=>'Student Record Not Updated','status'=>false));
}

?>
