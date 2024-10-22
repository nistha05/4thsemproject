

<?php require_once 'check_admin_login.php';?>
<?php
 if (is_numeric($_GET['dog_id'])){
     $dog_id = $_GET['dog_id'];

 } else {
    header('location:list_dogs_categories.php?msg=1');
 }
$dog_id = $_GET['dog_id'];
        require_once 'connection.php';
        //query to select data from table
        $sql = "SELECT * from dogs where dog_id=$dog_id";
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
<h2>Dogs list details</h2>
    <div>
        <?php if (!empty($row)) {?>
            <table class="view_table">
            <tr> 
                    <td> id</td>
                    <td><?php echo $row['dog_id'] ?></td>
                </tr>
                <tr> 
                    <td> name</td>
                    <td><?php echo $row['name'] ?></td>
                </tr>
                <tr> 
                    <td> age</td>
                    <td><?php echo $row['age'] ?></td>
                </tr> 
                <tr> 
                    <td> color</td>
                    <td><?php echo $row['color'] ?></td>
                </tr> 
                <tr> 
                    <td> breed</td>
                    <td><?php echo $row['breed'] ?></td>
                </tr> 
                <tr> 
                    <td> size</td>
                    <td><?php echo $row['size'] ?></td>
                </tr> 
                <tr> 
                    <td> gender</td>
                    <td><?php echo $row['gender'] ?></td>
                </tr> 
                <th>status</th>
                <td><?php echo $row['status'] ?></td>
            </tr>
            <tr>
            <th>message</th>
                <td><?php echo $row['message'] ?></td>
            </tr> 
            <tr>
            <th>image</th>
                <td><?php echo $row['image'] ?></td>
            </tr> 

            </table>

        <?php } else { ?>
            <div class="no_record"> Invalid category information </div>
        <?php } ?>
    </div>
</body>
</html>