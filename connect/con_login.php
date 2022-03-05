<?php  
  
include("connectdb.php");  
session_start();
  
if(isset($_POST['login']))  
{  
    $user_username=$_POST['user_username'];  
    $user_pass2=$_POST['user_pass'];  
    $user_pass = md5($user_pass2);

  
   $sql="SELECT * from user where user_username='$user_username' AND user_pass='$user_pass'";
   $result = mysqli_query($conn,$sql);
   $num_row = mysqli_num_rows($result);
	
 if ($num_row > 0)	 
 
    {$row=mysqli_fetch_array($result);
       
        if($row["user_status"]==1){
            $_SESSION["user_username"]=$row["user_username"];
            $_SESSION["user_pass"]=$row["user_pass"];
            echo "<script>window.location='../index.php'</script>";
        }        
        else if($row["user_status"]==2){
            $_SESSION["user_username"]=$row["user_username"];
            $_SESSION["user_pass"]=$row["user_pass"];
            echo "<script>window.location='../staff_pos.php'</script>";
        }	
        else if($row["user_status"]==3){
            $_SESSION["user_username"]=$row["user_username"];
            $_SESSION["user_pass"]=$row["user_pass"];
            echo "<script>window.location='../backed_dash.php'</script>";
        }			
    }  
    else  
    {  

       echo "<script>alert('email or password is incorrect!')</script>";  
       echo "<script>window.location='../login.php'</script>";


    }  
}