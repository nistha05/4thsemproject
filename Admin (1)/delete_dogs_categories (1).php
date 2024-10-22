 <?php require_once 'check_admin_login.php';?>
<?php

if (is_numeric($_GET['dog_id'])){
    $dog_id = $_GET['dog_id'];
}
else{
    header('location:list_dogs_categories.php?msg=1');
}

require_once "connection.php";
//query to select data from table
$sql= "DELETE from dogs where dog_id=$dog_id";
//execute query
$result = $connection->query($sql);
//assign blank array to store data from result
//check number of rows fetch by query
if($connection->affected_rows == 1){
    header('location:list_dogs_categories.php?msg=2');
}
else{
    header('location:list_dogs_categories.php?msg=3');
}
?> 
