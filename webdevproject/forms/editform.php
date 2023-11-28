<?php
//including the database connection file
include_once("../dbConnection/mysqlconfig_connection.php");
//getting the id of the data from the URL
$id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($dbc, "SELECT * FROM tblsubjects WHERE subject_id = $id");
if ($result) {
    $res = mysqli_fetch_array($result);
    $code = $res['subject_code'];
    $name = $res['subject_name'];
} else {
    echo "Error: " . mysqli_error($dbc); // Add error handling if the query fails
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Subject</h1>
    <a href="../functions/index.php">Home</a>
    <br><br>
    <form action="../functions/edit.php" name="form1" method="post" >
        <table border="0">
            <tr>
                <td>Subject Code</td>
                <td> <input type="text" name="code" value="<?php echo $code; ?>"></td>
            </tr>
            <tr>
                <td>Subject Name</td> <!-- Corrected the label to "Subject Name" -->
                <td> <input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td> <input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td> <input type="submit" name="update" value="Update"> </td>
            </tr>
        </table>
    </form>
</body>
</html>