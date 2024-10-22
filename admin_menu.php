<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Side</title>
    <style>

    body{
        margin: 0;
        padding:0;
        box-sizing: border-box;
    }
    .admin-side{
        display: flex;
        /* gap: 1rem; */
    }
    img{
        object-fit: cover;
    }
    a{
        text-decoration: none;
    }
    ul{
       list-style: none;
       background-color:rgba(59,59, 60, 1);
       width: 20%;
       height: 100vh;
        padding: 0;
        margin: 0;
      
    }
    ul li{
        font-size: 20px;
        padding: 20px;
        text-align: center
    }
    ul li a{
        text-decoration: none;
        color: #fff;
    }
    ul li:hover {
        background-color:#000;
    }
    ul li:first-child{
        background-color:rgba(59,59, 60, 1);
    }
    .dashboard {
        background-image:url(../images/paws.jpg);
        width: 80%;
    }
    .dashboard .top{
        background-color: rgba(59,59, 60, 1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-left: 20px;
        padding-right: 20px;
    }
    .dashboard .top h2{
        color: #fff;
    }
    .dashboard .top a{
        text-decoration: none;
        color: #fff;
        font-size: 20px;
        
    }
    .dashboard .row{
        display: flex;
        gap: 2rem;
        margin-left: 2.5rem;
        margin-top: 2rem;
    }
    .dashboard .dog-chart{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .dashboard h3{
        color: #fff;
        background-color: #000;
    }
    .add-dogs{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px;
        height: 100px;
        background: url("<?php echo $imgurl="image/bg1.jpg";?>");
        margin-bottom: 40px;
    }
    .list-dogs{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px;
        height: 100px;
        background: url("<?php echo $imgurl="image/bg2.jpg";?>");
    }
    .donation{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px;
        height: 100px;
        background: url("<?php echo $imgurl="image/bg3.jpg";?>");
    }
    .contact{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px;
        height: 100px;
        background: url("<?php echo $imgurl="image/bg4.jpg";?>");
    }
    .adoption{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px;
        height: 100px;
        background: url("<?php echo $imgurl="image/bg5.jpg";?>");
    }
    .Register{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px;
        height: 100px;
        background: url("<?php echo $imgurl="image/bg5.jpg";?>");
    }
</style>
</head>
<body>
<div class="admin-side">
    <ul>
        <?php
        $sn = explode('/', $_SERVER['SCRIPT_NAME']);
        $page = $sn[count($sn)-1];
        
        ?>
    <li><a href="admin_menu.php"><h1>Dog Adoption System</h1></a></li>
    <li class ="<?php echo ($page == 'add_dogs.php')?'active_link':''; ?>"><a href="add_dogs.php">Add Dogs</a></li>
    <li class ="<?php echo ($page == 'list_dog.php')?'active_link':''; ?>"><a href="list_dog.php">List Dogs</a></li>
    <li class ="<?php echo ($page == 'donate.php')?'active_link':''; ?>"> <a href="donate.php">Donation</a></li> 
    <li class ="<?php echo ($page == 'contacts.php')?'active_link':''; ?>"> <a href="contacts.php">Contact</a></li>
    <li class ="<?php echo ($page == 'adoption.php')?'active_link':''; ?>"> <a href="adoption.php">Adoption</a></li>
    
    <li class ="<?php echo ($page == 'Register.php')?'active_link':''; ?>"> <a href="register.php">Register</a></li>
    <li class ="<?php echo ($page == 'logout.php')?'active_link':''; ?>"> <a href="logout.php">Logout</a></li>
    </ul>

    <div class="dashboard">
       <div class="top">
        <h2>Dashboard</h2>
        <a href="logout.php">LogOut</a>
       </div>
        <div class="row">
            <div class="add-dogs <?php echo ($page == 'add_dogs.php')?'active_link':''; ?>">
                <!-- <img src="<?php echo $imgurl='image/pup.jpg'; ?>" alt="paw" width="200" height="100"> -->
                <a href="add_dogs.php"><h3>Add Dogs</h3></a>
            </div>
            <div class="list-dogs <?php echo ($page == 'list_dog.php')?'active_link':''; ?> ">
                <!-- <img src="<?php echo $imgurl='image/pup.jpg'; ?>" alt="paw" width="200" height="100"> -->
                <a href="list_dog.php"><h3>List of Dogs</h3></a>
            </div>
            <div class="donation <?php echo ($page == 'donate.php')?'active_link':''; ?>">
                <!-- <img src="<?php echo $imgurl='image/pup.jpg'; ?>" alt="paw" width="200" height="100"> -->
                <a href="donate.php"><h3>User's Donation</h3></a>
            </div>
            <div class="contact <?php echo ($page == 'contacts.php')?'active_link':''; ?>">
                <!-- <img src="<?php echo $imgurl='image/pup.jpg'; ?>" alt="paw" width="200" height="100"> -->
                <a href="contacts.php"><h3>User's Contact</h3></a>
            </div>
            <div class="adoption <?php echo ($page == 'adoption.php')?'active_link':''; ?>">
                <!-- <img src="<?php echo $imgurl='image/pup.jpg'; ?>" alt="paw" width="200" height="100"> -->
                <a href="adoption.php"><h3>List of Adoption </h3></a>
            </div>
            <div class="Register <?php echo ($page == 'Register.php')?'active_link':''; ?>">
                <!-- <img src="<?php echo $imgurl='image/pup.jpg'; ?>" alt="paw" width="200" height="100"> -->
                <a href="Register.php"><h3>List of register </h3></a>
            </div>
        </div>
        <!-- <div class="dog-chart">
            <div class="chart">
                <img src="<?php echo $imgurl="image/chart.svg";?>" alt="chart" height="400" width="650">
            </div> -->
           
        </div>
       
        
    </div>

</div>
</body>
</html>



