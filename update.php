<?php 
include "config.php";

// Check if the update form is submitted
if(isset($_POST["update"])){
    // Retrieve values from the form
    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // Prepare SQL query to update user information
    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', password='$password', gender='$gender' WHERE id='$user_id'";
    
    // Execute the query
    $result = $conn->query($sql);

    // Check if the query executed successfully
    if($result === TRUE){
        echo "Record Updated successfully";
    }
    else{
        echo "Error: ".$sql."<br>".$conn->error;
    }
}

// Check if an ID is provided in the URL
if(isset($_GET["id"])){
    $user_id = $_GET['id'];

    // Retrieve user information from the database based on the provided ID
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = $conn->query($sql);

    // Check if a user with the provided ID exists
    if($result->num_rows > 0){
        // Fetch user information
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $password = $row['password'];
        $gender = $row['gender'];
        $id = $row['id'];

        // Display the update form with pre-filled user information
?>
<h2>User Update Form</h2>
<form action="" method="post">
    <fieldset>
        <legend>Personal Information</legend>
        First Name:<br>
        <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>
        <input type="hidden" name="user_id" value="<?php echo $id; ?>"><!-- Removed unnecessary <br> tag here -->
        Last Name:<br>
        <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>
        Email:<br>
        <input type="email" name="email" value="<?php echo $email; ?>"><br>
        Password:<br>
        <input type="password" name="password" value="<?php echo $password; ?>"><br>
        Gender:<br>
        <input type="radio" name="gender" value="Male" <?php if($gender=='Male'){echo "checked";}?>>Male
        <input type="radio" name="gender" value="Female" <?php if($gender=='Female'){echo "checked";}?>>Female
        <input type="radio" name="gender" value="Other" <?php if($gender=='Other'){echo "checked";}?>>Other
        <!-- Changed value from 'Others' to 'Other' -->
        <br><br>
        <input type="submit" name="update" value="Update">
    </fieldset>
</form>
<?php
    } else {
        echo "No user found with the provided ID.";
    }
}
header("location:create.php");
?>