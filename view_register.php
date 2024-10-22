

<?php require_once 'check_admin_login.php';?>
<?php
 if (is_numeric($_GET['c_id'])){
     $c_id = $_GET['c_id'];

 } else {
    header('location:Register_list.php?msg=1');
 }
$c_id = $_GET['c_id'];
        require_once 'connection.php';
        //query to select data from table
        $sql = "SELECT * from users where c_id=$c_id";
       //execute query
        $result = $connection->query($sql);

        //check number of rows fetch by query
        if ($result-> num_rows == 1) {
            $row = $result->fetch_assoc();

        } else {
            $row = [];
        }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dogs category details </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="wrapper">
<h2>Register list details</h2>
    <div>
        <?php if (!empty($row)) {?>
            <table class="view_table">
            <tr> 
                    <td> ID</td>
                    <td><?php echo $row['c_id'] ?></td>
                </tr>
                <tr> 
                    <td> name</td>
                    <td><?php echo $row['name'] ?></td>
                </tr>
                <tr> 
                    <td>email </td>
                    <td><?php echo $row['email'] ?></td>
                </tr> 
                <tr> 
                    <td> password</td>
                    <td><?php echo $row['password'] ?></td>
                </tr> 
                <tr> 
                    <td> Phone_number</td>
                    <td><?php echo $row['phone_number'] ?></td>
                </tr> 

            </table>

        <?php } else { ?>
            <div class="no_record"> Invalid category information </div>
        <?php } ?>
    </div>
</body>
</html>