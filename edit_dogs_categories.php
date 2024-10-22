<?php require_once 'check_admin_login.php';?>
<?php

 if (is_numeric($_GET['dog_id'])){
     $dog_id = $_GET['dog_id'];

 } else {
    header('location:list_dogs_categories.php?msg=1');
 }
 $photo= '';
 if (isset($_POST['btnUpdate'])) {
    //assign error to $err array
    $err =[];
   
    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
       $name = $_POST['name'];
       } else {
       $err['name'] = 'Please enter name';
       }
   
   if (isset($_POST['age']) && !empty($_POST['age']) && trim($_POST['age'])) {
       $age = $_POST['age'];
       } else {
       $err['age'] = 'Please enter age';
       }
   
   
   if (isset($_POST['color']) && !empty($_POST['color']) && trim($_POST['color']))  {
       $color = $_POST['color'];
      } else {
       $err['color'] = 'Please enter color';
         }
   if (isset($_POST['breed']) && !empty($_POST['breed']) && trim($_POST['breed'])) {
       $breed = $_POST['breed'];
       } else {
       $err['breed'] = 'Please enter breed';
       }
   
   if (isset($_POST['size']) && !empty($_POST['size'])) {
       $size = $_POST['size'];
       } else {
       $err['size'] = 'Please enter size';
       }
   
  
//check dog message
if (isset($_POST['message']) && !empty($_POST['message']) && trim($_POST['message'])) {
    $message = $_POST['message'];
  
 } else {
   $err['message'] = "Please enter the Message";
 }


  //check image
  if ($_FILES['photo']['error'] == 0) {
    if ($_FILES['photo']['size'] <= 1000000) {
      $imFormat = ['image/png','image/jpeg'];
      if (in_array($_FILES['photo']['type'], $imFormat)) {
        $fname = uniqid() . '_' . $_FILES['photo']['name'];
      move_uploaded_file($_FILES['photo']['tmp_name'],'image/' . $fname );
      echo 'Upload success';
      } else {
        $err['photo'] = 'Select Valid Image Format(png,jpeg)';
      }
        } else {
        $err['photo'] = 'Select Valid Image Size (less than 1MB)';
       }
     } else{
        $err['photo'] = 'Select Valid Image';
     }
   
 $gender = $_POST['gender'];
 $status = $_POST['status'];
if (count($err) ==0) {
        require_once 'connection.php';
        $sql = "update dogs set name='$name',age='$age',color='$color',breed='$breed',
        size='$size',gender='$gender', status='$status',message='$message',image='$fname' where dog_id='$dog_id'";
        //execute query
        $connection->query($sql);
        if ($connection->affected_rows == 1){
            $success = 'category update sucess';
        } else {
            $error = 'Catagory update failed';
        }
         }

}

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
        <title>Dog category edit </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="wrapper">
<h2>Dog List edit</h2>
    <div>
    <form action="" method="post" id="category_form" enctype="multipart/form-data">
        <fieldset> 
            <?php if(isset($error)) {?>
                <p class="error_message"><?php echo $error ?> </p>
            <?php } ?>

            <?php if(isset($success)) {?>
                <p class="success_message"><?php echo $success ?> </p>
            <?php } ?>

            <?php if(isset($_GET['err']) && $_GET['err']==1) {?>
                <p class="error_message">Please login to continue. </p>
            
            <?php } ?>
            <legend> Add dog Form</legend>
            <div class="form-group">
                <label for="name"> dog name </label>
                <input type="text" name="name" id="name" placeholder="Enter name"
                value="<?php echo isset($row['name'])?$row['name']:'' ?>">
                <?php if (isset($err['name'])) { ?>
                <span class="error"><?php echo $err['name'] ?> </span>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="age"> age </label>
                <input type="text" name="age" id="age" placeholder="Enter age"
                value="<?php echo isset($row['age'])?$row['age']:'' ?>">
                <?php if (isset($err['age'])) { ?>
                <span class="error"><?php echo $err['age'] ?> </span>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="breed"> breed </label>
                <input type="text" name="breed" id="breed" placeholder="Enter breed"
                value="<?php echo isset($row['breed'])?$row['breed']:'' ?>">
                <?php if (isset($err['breed'])) { ?>
                <span class="error"><?php echo $err['breed'] ?> </span>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="color"> color </label>
                <input type="text" name="color" id="color" placeholder="Enter color"
                value="<?php echo isset($row['color'])?$row['color']:'' ?>">
                <?php if (isset($err['color'])) { ?>
                <span class="error"><?php echo $err['color'] ?> </span>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="size"> size </label>
                <select class="size" name="size" id="size" placeholder="Select size" style="padding:10px;"  >
                <option >select size</option>
                    <option value="large">large</option>
                    <option value="medium"> medium</option>
                    <option value="small">small</option>
                 </select>
            </div>

            <div class="form-group">
                <label for="gender"> gender </label>
                <input type="radio" name="gender" value="male" >Male
                <input type="radio" name="gender" value="female" >Female
            </div>
            <div class="form-group"> 
          <label>Dogs Message</label>
            <textarea type="text" placeholder="Type Message" name="message" value="<?php echo isset($message)?$message:''?>"></textarea>
            <?php  if (isset($err['message'])){?>
            <span class="error"><?php echo $err['message'] ?></span>
            <?php }?>
        </div>

            <div class="form-group">
                <label for="status">Status</label>
                 <input type="radio" name="status"  value="1">Active
                <input type="radio" name="status"  value="0" checked> Deactive 
                   
        </div>
               
        <div class="form-group"> 
            <label>Dogs Image</label>
            <input type="file" name="photo" value="<?php echo isset($fname)?$fname:''?>"/>
            <?php  if (isset($err['photo'])){?>
            <span class="error"><?php echo $err['photo'] ?></span>
            <?php }?>
        </div> 


            <div class="form-group">
                <input type ="submit" name="btnUpdate" id="Update" value="Update">
                <input type="reset" name="btnReset" id="reset" value="Clear">
             </div>
        </fieldset>
    </from>
    </div>
</body>
</html>
