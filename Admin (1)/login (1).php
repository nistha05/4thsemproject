 <?php 

if (isset($_COOKIE['admin_id'])) {
    session_start();
    $_SESSION['admin_id']= $_COOKIE['admin_id'];
    $_SESSION['admin_name']= $_COOKIE['admin_name'];
    $_SESSION['admin_email']= $_COOKIE['admin_email'];
    header('location:dashboard.php');
  }  
//check button click
if (isset($_POST['btnLogin'])) {
 //assign error to $err array
 $err =[];
 
  
 if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email']))  {
      $email = $_POST["email"];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = "Invalid email format";
      }
      } else {
      $err['email'] = 'Please enter email';
      }
if (isset($_POST['password']) && !empty($_POST['password']) && trim($_POST['password'])){
    $password =$_POST['password'];
    $enctypted_password = md5($password);
  } else{
    $err['password'] = 'Please enter password';
  }
    if (count($err) ==0) {
        
        require_once 'connection.php';
       $sql = "SELECT id, name,email FROM  admins WHERE email='$email' AND password='$enctypted_password' AND status = 1";
        //execute query
        $result = $connection->query($sql);
        
 
if ($result->num_rows== 1){
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['admin_id']= $row['id'];
    $_SESSION['admin_name']= $row['name'];
    $_SESSION['admin_email']= $row['email'];
    
    
    //check remember me button
    if(isset($_POST['remember'])){
        //store data into cookie also
        setcookie('admin_id',$row['id'],time()+7*24*60*60);
        setcookie('admin_email',$row['email'],time()+7*24*60*60);
        setcookie('admin_name',$row['name'],time()+7*24*60*60);
    }
    
    //redirect to next page

    header('location:dashboard.php');
    
   } else {
        $msg = 'Credential Not match';
   }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login page </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1> Admin Login page</h1>
    <form action="" method="post" id="login_form">
        <fieldset> 
            <?php if(isset($msg)) {?>
                <p class="error_message"><?php echo $msg ?> </p>
            <?php } ?>
            <?php if(isset($_GET['err']) && $_GET['err']==1) {?>
                <p class="error_message">Please login to continue. </p>
            
            <?php } ?>
            <legend> Login Form </legend>
            <div class="form-group">
            <img id="profile-img" class="profile-admin" src="user.png"/>
                
                <label for="email"> Email </label>
                <input type="text" name="email" id="email" placeholder="Enter email"
                value="<?php echo isset($email)?$email:'' ?>">
                <?php if (isset($err['email'])) { ?>
                <span class="error"><?php echo $err['email'] ?> </span>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="password"> Password </label>
                <input type="password" name="password" id="password" placeholder="Enter password"
                value="<?php echo isset($password)?$password:'' ?>">
                <?php if(isset($err['password'])) { ?>
                <span class="error"><?php echo $err['password']?></span>
                <?php } ?>
            </div>
            <div class="from-group">
                <input type="checkbox" name="remember" id="remember" value="remember" >
                 Remember me for 7 days
            </div>
            <div class="form-group">
                <input type ="submit" name="btnLogin" id="login" value="Login">
                 <input type="reset" name="btnReset" id="reset" value="Clear">
             </div>
        </fieldset>
    </from>
</body>
</html>
