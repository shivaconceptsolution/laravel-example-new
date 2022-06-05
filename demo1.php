<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
$conn=mysqli_connect('localhost','root','','college');

$result = array();
 $res= "SELECT * FROM `course`";
 $data = mysqli_query($conn,$res);
while($row = mysqli_fetch_array($data)){
array_push($result,
array(
    'courseid'=>$row[0],
    
    'coursename'=>$row[1]
    ));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($conn);

?>