<?php
if (isset($_POST['btnlogin'])) {
    $err = [];
//check name
if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
        $name = $_POST['name'];
        if (!preg_match('/^[A-Za-z\s]+$/', $_POST['name'])) {
            $err['nname'] = "**Please enter a valid  Name";
        }
    } else {
        $err['name'] = "**Please enter the name";
    }
    
 

    //check email
    if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])) {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err['email'] = "**Please enter a valid email";
        }
    } else {
        $err['email'] = "**Please enter the email field";
    }

    //check phone number
    if (isset($_POST['phone']) && !empty($_POST['phone']) && trim($_POST['phone'])) {
        $phone = $_POST['phone'];
        if (!preg_match('/^[9]{1}[0-9]{9}$/',$_POST['phone'] )) {
            $err['phone'] = "**Please enter a valid phone";
        }
    } else {
        $err['phone'] = "**Please enter the phone";
    }
    //check address
    if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address'])) {
        $address = $_POST['address'];
        if (!preg_match('/^[A-Za-z\s]+$/', $_POST['address'])) {
            $err['address'] = "**Please enter a valid  Name";
        }
    } else {
        $err['address'] = "**Please enter the address";
    }
    //check subject
    if (isset($_POST['subject']) && !empty($_POST['subject']) && trim($_POST['subject'])) {
        $subject = $_POST['subject'];
       } else {
        $err['subject'] = "**Please enter the subject";
    }
//check message
if (isset($_POST['message']) && !empty($_POST['message']) && trim($_POST['message'])) {
    $message = $_POST['message'];
   } else {
    $err['message'] = "**Please enter the message";
}

   

//connection with database and insert data into database
    if (count($err) == 0) {
      require_once 'connection.php';
        $query = "INSERT INTO contact (name,email,address,phone,subject,message) VALUES ('$name','$email','$address','$phone','$subject','$message')";
        if (mysqli_query($connection, $query)) {
           // header("location:list_contact-info.php");
        } else {
            echo "Error inserting data: " . mysqli_error($connection);
        }
    }
}
?>   


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
    <div class="header" >
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo3.png" alt="logo"><p>Dog Adoption System</p></a>
                </div>
                <div class="links">
                    <a  href="index.php">Home</a>
                    <a href="ABout-us.php">About-Us</a>
                    <a href="Animals.php">Animals</a>
                    <a  id="Contact" href="Contact.php">Contact</a>
                    <a href="Donation.php">Donate</a>
                    <a href="Admin_login.php">Admin</a>
                    <a  href="userregister.php">Register</a>
                    
                </div>
            </div>
        </div>
    </div> 
    <div class="location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.041050162522!2d85.31686126141338!3d27.705511431055555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19006da38c97%3A0xeb1680160e08401c!2sRatna%20Park!5e0!3m2!1sen!2snp!4v1685989483811!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="row">
        <div class="container">
            <div class="contact">
                <div class="contact-info">
                    <h3>How to Conatct Us</h3>
                    <div class="sub-info"> 
                        <h4>Conatct info</h4>
                        <ul type="none">
                            <li><i class="fa-solid fa-location-pin"></i>Dog Adoption System<br>Bagbazar,Ktm</li>
                            <li><i class="fa-solid fa-phone"></i>phone:00876543</li>
                            <li><i class="fa-regular fa-envelope"></i>Email:info@Dogadoptionsystem.com</li>
                        </ul>
                    </div>
                    <div class="shelter">
                        <h4>Regular Shelter Hour</h4>
                        <ul type="none">
                            <li>Monday-Friday:12:00pm to 6:00pm</li>
                            <li>Sunday:11:00am to 4:00pm</li>
                            <li>Saturday:Closed</li>
                        </ul>
                    </div>
                    <div class="icons">
                        <h3>Follow Us</h3>
                        <ul type="none">
                            <li><i class="fa-brands fa-facebook"></i></li>
                            <li><i class="fa-brands fa-instagram"></i></li>
                            <li> <i class="fa-brands fa-twitter"></i><li>
                            <li><i class="fa-brands fa-youtube"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="contact-form">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                        <h3>Contact Form</h3>
                        <div class="box-one"> 
                                <div class="full-name">
                                    <label >FULL NAME</label><br> <br>
                                    <input type="text" name="name" placeholder="Enter Full Name" id="name" value="<?php echo isset($name) ? $name : '' ?>">
                                    <?php if (isset($err['name'])) { ?>
                                        <span class="error">   <?php echo $err['name'] ?></span>
                                    <?php } ?>
                                   

                                </div>
                                <div class="email">
                                    <label >EMAIL</label><br><br>
                                    <input type="email" name="email" placeholder="Enter Email" id="email" value="<?php echo isset($email) ? $email : '' ?>">
                                    <?php if (isset($err['email'])) { ?>
                                        <span class="error">   <?php echo $err['email'] ?></span>
                                    <?php } ?>
                                   

                                </div>
                            </div>
                            <div class="box-two">   
                                <div class="address">
                                    <label >ADDRESS</label><br><br>
                                    <input type="text" name="address" placeholder="Enter address"  id="address" value="<?php echo isset($address) ? $address : '' ?>">
                                    <?php if (isset($err['address'])) { ?>
                                        <span class="error">   <?php echo $err['address'] ?></span>
                                    <?php } ?>
                                   </div>
                                <div class="Mobile-Number">
                                    <label >MOBILE NUMBER</label><br><br>
                                    <input type="phone" name="phone" placeholder="Enter Mobile Number" id="phone" value="<?php echo isset($phone) ? $phone : '' ?>">
                                    <?php if (isset($err['phone'])) { ?>
                                        <span class="error">   <?php echo $err['phone'] ?></span>
                                    <?php } ?>
                                   
                                </div>
                            </div>
                            <div class="box-three">   
                                <div class="subject">
                                    <label>SUBJECT</label><br><br>
                                    <input type="text" name="subject" placeholder=" Enter The Subject Of Your Message" id="subject" value="<?php echo isset($subject) ? $subject : '' ?>">
                                    <?php if (isset($err['subject'])) { ?>
                                        <span class="error">   <?php echo $err['subject'] ?></span>
                                    <?php } ?>
                                    </div>
                                </div>
                                <div class="box-four">
                                    <label id="message">MESSAGE </label><br><br>
                                    <textarea id="message" name="message" rows="6" cols="24" placeholder="Enter Your Message" id="message" value="<?php echo isset($message) ? $message : '' ?>"></textarea>
                                    <?php if (isset($err['message'])) { ?>
                                        <span class="error">   <?php echo $err['message'] ?></span>
                                    <?php } ?>
                                </div>
                                <div class="btn">
                                    <input type="submit" name="btnlogin" id="btnlogin" value="SUBMIT">
                                </div> 
                            </div>
                    </form>
                </div> 
            </div>  
        </div>
    </div>
         
    <div class="footer">
        <div class="column-one">
            <img src="images/logo3.png" alt="logo"><p>Dog Adoption System</p><br>
            <p>
                Dog Adoption System focuses on<br> saving at-risk dogs in pound<br> facilities. We save homeless dogss, <br>give them medical care and a <br>safe temporary home, 
                and<br> provide responsible adoption<br> services to those seeking dogs.
            </p>
        </div>
        <div class="column-two">
          <h2>Featured Pets</h2> 
            <div class="card">
                <div class="image">
                 <a href="Animals.php">  <img src="images/dog7.jpg" alt="one"></a> 
                </div>
               <div class="description">
               cherry<br>
                Golden Retriver<br>
                Adult Feamle/
                Medium
               </div>
            </div>
            <div class="card">
                <div class="image">
                  <a href="Animals.php"><img src="images/lab.jpg" alt="one"></a>  
                </div>
                <div class="description">
                    coco<br>
                   labrador<br>
                    Baby Feamle/
                    Medium
                </div>
            </div>
            <div class="card">
                <div class="image">
                   <a href="Animals.php"><img src="images/dog5.jpg" alt="one"></a> 
                </div>
                <div class="description">
                    Reo<br>
                    Terrier<br>
                    Adult Male/
                    Medium
                </div>
            </div>
        </div>
        <div class="column-three">
            <h2>Contact</h2>
            <div class="contact-info">
            <p>Dog Adoption System<br>Bagbazar,ktm</p>
            <p>Monady-Friday:12:00 pm to 6:00 pm<br>Sunday:11:00 am to 4:00 pm<br>Saturday:Closed</p>
            <p>269-492-1010<br>info@Dogadoptionsystem.com</p>
            <ul type="none">
                <a href="https://www.facebook.com/"><li><i class="fa-brands fa-facebook"></i></li></a>
               <a href="https://www.instagram.com/"> <li><i class="fa-brands fa-instagram"></i></li></a>
               <a href="https://twitter.com/"><li><i class="fa-brands fa-twitter"></i></li></a> 
               <a href="https://www.youtube.com/"> <li><i class="fa-brands fa-youtube"></i></li></a>
            </ul>
        </div>
        </div>
    </div>

  
      
</body>
</html>