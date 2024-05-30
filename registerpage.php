<?php 

include 'connection.php';

if(isset($_POST['signUp'])){
    $YourName=$_POST['YourName'];
    $Mobile_number=$_POST['Mobile_number'];
    $email=$_POST['email'];
    $Username=$_POST['Username'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail="SELECT * From register where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO register(YourName,Mobile_number,email,Username,password)
                       VALUES ('$YourName','$Mobile_number','$email','$Username','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: regiterandlogin.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM register WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: index.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }

}
?>