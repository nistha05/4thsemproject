

<?php require_once 'check_admin_login.php';?>
<?php
 if (is_numeric($_GET['id'])){
     $id = $_GET['id'];

 } else {
    header('location:adoption_list.php?msg=1');
 }
$id = $_GET['id'];
        require_once 'connection.php';
        //query to select data from table
        $sql = "SELECT * from adptions where id=$id";
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
<h2>Adoption_list</h2>
    <div>
        <?php if (!empty($row)) {?>
            <table class="view_table">
            <tr> 
                    <td> ID</td>
                    <td><?php echo $row['id'] ?></td>
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
                    <td> number</td>
                    <td><?php echo $row['number'] ?></td>
                </tr> 
                <tr> 
                    <td> address</td>
                    <td><?php echo $row['address'] ?></td>
                </tr> 
                <tr> 
                    <td> Adoption_date</td>
                    <td><?php echo $row['adoption_date'] ?></td>
                </tr> 
                <tr> 
                    <td> dog_category</td>
                    <td><?php echo $row['dog_category'] ?></td>
        </tr>
        <tr> 
                    <td> message</td>
                    <td><?php echo $row['message'] ?></td>
        </tr>
        <?php } else { ?>
            <div class="no_record"> Invalid category information </div>
        <?php } ?>
    </div>
</body>
</html>