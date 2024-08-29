<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include "connection.php";

$data = json_decode(file_get_contents("php://input"),true);

$student_id = $data['sid'];

$result = $obj->query("DELETE FROM student WHERE id = '$student_id'");

if($result)
{
    echo json_encode(array('message'=>'Student Record Delete','status'=>true));
}
else
{
    echo json_encode(array('message'=>'Student Record Not Deleted','status'=>false));
}

?>
