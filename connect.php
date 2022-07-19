<?php 
$name = $_POST['name'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$email = $_POST['email'];
//Database Connection



$conn = new mysqli('localhost','root','','gym');
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into registration(name,age,height,weight,gender,address,email)values(?,?,?,?,?,?,?)");
    
    if($name != "" && $age != "" && $height != ""&& $weight != ""&& $gender != ""&& $address != ""&& $email != "")
    {
    $stmt->bind_param("siiisss",$name,$age,$height,$weight,$gender,$address,$email);
    $stmt->execute();
    echo "<script>alert('YOU HAVE SUCCESSFULLY REGISTERED. JUST CLOSE THIS WINDOW NOW')</script>";
    $stmt->close();
    $conn->close();
    }
    else{
        echo "Fields are empty . Please fill all sections";
    }
}
?>