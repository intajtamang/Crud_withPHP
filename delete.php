<?php 
include "config.php";

if(isset($_GET["id"])){
    $user_id = $_GET['id'];

    // Fix the SQL query by using backticks (`) instead of single quotes (') for table and column names
    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";

    $result = mysqli_query($conn, $sql);

    if($result === TRUE){
        echo "Record deleted successfully";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
header("location:create.php");
?>