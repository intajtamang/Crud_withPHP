<?php
    include "config.php";

    $sql="SELECT * FROM users";

    $result=$conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>users</h2>
        <table class="table">

            <head>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Gender</th>
                </tr>
            </head>
            <tbody>
                <?php 
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                   ?>

                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><a class="btn btn-info" href="update.php?id=" <?php echo $row['id'];?>>Edit</a>&nbsp;<a
                            class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?></td>">Delete</a>
                    </td>
                </tr>
                <?php }
                    } ?>
            </tbody>

        </table>
    </div>
</body>

</html>