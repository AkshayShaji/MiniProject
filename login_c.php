<?php
/*
session_start();



$localhost = 'localhost';
$username = 'root';
$password = 'Pass@123';
$database = 'telas_track';

$conn = new mysqli($localhost, $username, $password, $database);
if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{$email = $_POST['email'];
$password = $_POST['password'];
$userType = $_POST['userType'];

if ($userType == "seller"|| $userType===TRUE) {
    $stmt1 = "SELECT id_s FROM s_register WHERE s_gmail LIKE '%$email%' AND  s_password LIKE '%$password%' ";
    $result1=$conn->query($stmt1);
    if($result){
   echo "success";
  
    header("Location: Index7.html");
    }

} elseif ($userType == "customer" || $userType===TRUE) {
    $stmt = "SELECT id_c FROM s_register WHERE c_gmail LIKE '%$email%' AND  c_password LIKE '%$password%'";
    $result1=$conn->query($stmt);
    if(!empty($result1)){
    echo "success";
   
}
}
 else {
 echo "invalid email or password";
   
    
} 
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $response = array(['success' => false,'message' => 'Successful login']);
  
} else {
    $response = array('success' => false, 'message' => 'Invalid email or password');
    header('Content-Type: application/json');
    echo json_encode($response);
}

$conn->close();

*/

$localhost='localhost';
$username='root';
$password='Pass@123';

$conn=new mysqli("$localhost",$username,$password,"telas_track");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["cbox"];

   /* $sql = "INSERT INTO s_register (s_name, s_username, s_gmail, s_phone, s_password, shop_id) VALUES ('$user', '$username', '$email', '$phone', '$password', '')";

    if ($conn->query($sql) === true) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}*/
if($role=="customer" || $role===TRUE)
{
    $sql1="SELECT id_c FROM s_register WHERE c_gmail= $email AND  c_password=$password" ;
if($sql1->execute() === TRUE)
{
    header("Location: Index7.html");
   
}
else{
    echo "not inserted";
}}
else if($role=="seller"|| $role===TRUE)
{
    $sql3 = $conn->prepare("INSERT INTO s_register (id_s, s_name, s_username, s_gmail, s_phone, s_password) VALUES (?, ?, ?, ?, ?, ?)");
$sql3->bind_param("ssssss", $user_id,$user, $username, $email, $phone, $password);
if($sql3->execute() === TRUE)
{
    header("Location: Index7.html");
}
else{
    echo "option not inserted";
}}
else{
   echo "option not selected";
}
}
$conn->close();
?>
