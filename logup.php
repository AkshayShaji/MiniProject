
<?php
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
if($role=="customer" || $option===TRUE)
{
   
    $sql1 = $conn->prepare("INSERT INTO c_register (id_c, c_name, c_username, c_gmail, c_phone, c_password) VALUES (?, ?, ?, ?, ?, ?)");
$sql1->bind_param("ssssss", $user_id,$user, $username, $email, $phone, $password);
if($sql1->execute() === TRUE)
{
    header("Location: Index7.html");
   
}
else{
    echo "not inserted";
}}
else if($role=="seller"|| $option===TRUE)
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







