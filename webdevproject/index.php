<?php
    #Connect DB
    include_once("dbConnection/mysqlconfig_connection.php");
    #Fetch Data in DB
    include_once("functions/fetch.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample CRUD</title>
</head>
<body>
    <h1>My Subjects</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr";
                    echo "<td>".$res['Subject_ID']."</td>";
                    echo "<td>".$res['Subject_Code']."</td>";
                    echo "<td>".$res['Subject_Name']."</td>";
                    echo "<td><a href=\"forms/editform.php?id=$res[Subject_ID]\">Edit</a> |
                            <a href=\"functions/delete.php?id=$res[Subject_ID]\"
                            onClick=\"Return Confirmed('Are you sure you want to delete')\">Delete</a></td>";
                }
            ?>
        </tbody>
    </table>
    
</body>
</html>