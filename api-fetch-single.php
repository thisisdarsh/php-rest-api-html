<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "connection.php";

$data = json_decode(file_get_contents("php://input"),true);

$student_id = $data['sid'];

$result = $obj->query("SELECT * FROM student WHERE id = '$student_id'");

if($result->num_rows > 0)
{
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    echo json_encode(array('message'=>'No Record Found','status'=>false));
}

?>
