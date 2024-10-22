<?php require_once 'check_admin_login.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Room category Create </title>
        <link rel="stylesheet" type="text/css" href="css/Himani1.css">
</head>
<body>
<?php require_once 'admin_menu.php';?>
<div class="wrapper">
<h5>Room category Create</h5>
    <div>
    <form action="" method="post" id="category_form">
        <fieldset> 
            <?php if(isset($msg)) {?>
                <p class="error_message"><?php echo $msg ?> </p>
            <?php } ?>
            <?php if(isset($_GET['err']) && $_GET['err']==1) {?>
                <p class="error_message">Please login to continue. </p>
            
            <?php } ?>
            <legend> Category Room Form</legend>
            <div class="form-group">
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
                <input type="checkbox" name="remember" id="remember" value="remember" />
                 Remember me for 7 days
            </div>
            <div class="form-group">
                <input type ="submit" name="btnLogin" id="login" value="Login">
                 <input type="reset" name="btnReset" id="reset" value="Clear">
             </div>
        </fieldset>
    </from>
        
    </div>
</div>

</body>
</html>