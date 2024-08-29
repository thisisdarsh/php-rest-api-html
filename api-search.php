<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "connection.php";

// $data = json_decode(file_get_contents("php://input"),true);

// $serch_value = $data['search'];

$serch_value = isset($_GET['search']) ? $_GET['search'] : die();

$result = $obj->query("SELECT * FROM student WHERE `name` LIKE '%$serch_value%'");

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
