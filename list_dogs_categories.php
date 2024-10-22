<?php require_once 'check_admin_login.php';?>
<?php 
        require_once 'connection.php';
        //query to select data from table
        $sql = "SELECT  * from dogs";
       //execute query
       //assign blank array to store data from result
        $result = $connection->query($sql);
        $data = [];
    //check nimber of rows fetch by query
        if ($result-> num_rows > 0) {
            //fetch date from result object
            while($row = $result->fetch_assoc()) {
                array_push($data,$row);
            }

        }

    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>dog category List </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wrapper">
<!-- <h2>dog List</h2> -->
    <div>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 1) { ?>
            <p class="error_message"> Invalid request </p>
         <?php } ?>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 3) { ?>
             <p class="error_message"> Unable to delete category </p>
         <?php } ?>
         <?php if (isset($_GET['msg']) && $_GET['msg'] == 2) { ?>
             <p class="success_message"> category deleted success </p>
         <?php } ?>
        <table class="list_table">
            <thead>
                <tr>
                    <th>sn</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>age</th>
                    <th>breed</th>
                    <th>color</th>
                    <th>size</th>
                    <th>gender</th>
                    <th>status</th>
                    <th>message</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
             </thead>
             <tbody>
                <?php if (count($data) > 0) { ?>
                  <?php foreach ($data as $key => $record) { ?>
                <tr>
                    <td><?php echo $key+1 ?></td> 
                    <td><?php echo $record['dog_id'] ?></td>
                    <td><?php echo $record['name'] ?></td>
                    <td><?php echo $record['age'] ?></td>
                    <td><?php echo $record['breed'] ?></td>
                    <td><?php echo $record['color'] ?></td>
                    <td><?php echo $record['size'] ?></td>
                    <td><?php echo $record['gender'] ?></td>
                    
                     <td><?php if ($record['status'] == 1){
                    echo 'active';
                }
                else
                {
                    echo 'De Active';
                }  ?>
                </td> 

                    <td><?php echo $record['message'] ?></td>
                    <td><img src="image/<?php echo $record['image'] ?>" height="30px" width="30px" /></td>


                    <td class="action_column">
                        <a href="view_dogs_categories.php?dog_id=<?php echo $record['dog_id'] ?>" class="view">View</a>
                        <a href="edit_dogs_categories.php?dog_id=<?php echo $record['dog_id'] ?>" class="edit">Edit</a>
                        <a href="delete_dogs_categories.php?dog_id=<?php echo $record['dog_id'] ?>" class="delete" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
                         
                </tr>
                <?php } ?>
                <?php } else {?>
                <tr class="no_record">
                    <td colspan="12"> No categories found into database</td>
                </tr>
            <?php } ?>
    </tbody>
                
        </table>
    </div>
</body>
</html>
