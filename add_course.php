<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
$conn=mysqli_connect('localhost','root','','college');
if(!$conn)
die("problem in connection");
//$json = file_get_contents('php://input');
//$data = json_decode($json);
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
$cid = $_REQUEST['cid'];
//$uname = $data->email;
$cname = $_REQUEST['cname'];

// Insert data into data base
$sql = "INSERT INTO `course` (`courseid`, `coursename`) VALUES ('$cid', '$cname')";
$qur = mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn)>0)
{
$json = array("status" => 1, "msg" => "Reg Successfully");
}
else{
		$json = array("status" => 0, "msg" => die(mysqli_error($conn)));
	}
}
else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}

@mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($json);
	
	?>