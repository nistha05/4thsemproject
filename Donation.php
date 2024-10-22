<?php
if (isset($_POST['btnlogin'])) {
    $err = [];
//firstname
if (isset($_POST['firstname']) && !empty($_POST['firstname']) && trim($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
        if (!preg_match('/^[A-Za-z\s]+$/', $_POST['firstname'])) {
            $err['firstname'] = "**Please enter a valid  Name";
        }
    } else {
        $err['firstname'] = "**Please enter the firstname";
    }
    //lastname
    if (isset($_POST['lastname']) && !empty($_POST['lastname']) && trim($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
        if (!preg_match('/^[A-Za-z\s]+$/', $_POST['lastname'])) {
            $err['lastname'] = "**Please enter a valid  lastname";
        }
    } else {
        $err['lastname'] = "**Please enter the lastname";
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
    if (isset($_POST['number']) && !empty($_POST['number']) && trim($_POST['number'])) {
        $number = $_POST['number'];
        if (!preg_match('/^[9]{1}[0-9]{9}$/',$_POST['number'] )) {
            $err['number'] = "**Please enter a valid number";
        }
     } else{
            $err['number'] = "**Please enter the number";
        
        }
//address
    if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address'])) {
        $address = $_POST['address'];
        if (!preg_match('/^[A-Za-z\s]+$/', $_POST['address'])) {
            $err['address'] = "**Please enter a valid  Name";
        }
    } else {
        $err['address'] = "**Please enter the address";
    }
 //image
    if ($_FILES['photo']['error'] == 0) {
        if ($_FILES['photo']['size'] <= 1000000) {
          $imFormat = ['image/png','image/jpg','image/jpeg'];
          if (in_array($_FILES['photo']['type'], $imFormat)) {
            $fname = uniqid() . '_' . $_FILES['photo']['name'];
          move_uploaded_file($_FILES['photo']['tmp_name'],'images/' . $fname );
          echo 'Upload success';
          } else {
            $err['photo'] = 'Select Valid Image Format(png,jpg,jpeg)';
          }
            } else {
            $err['photo'] = 'Select Valid Image Size (less than 1MB)';
           }
         } else{
            $err['photo'] = 'Select Valid Image';
         }

    

//description
 if (isset($_POST['description']) && !empty($_POST['description']) && trim($_POST['description'])) {
    $description = $_POST['description'];
  
} else {
   $err['description'] = "**Please enter the Message";
}
//doation_type
if (isset($_POST['donation_type']) && !empty($_POST['donation_type']) && trim($_POST['donation_type'])) {
    $donation_type = $_POST['donation_type'];
  
} else {
   $err['donation_type'] = "**Please enter the donation_type";
}


//connection with database and insert data into database
if (count($err) == 0) {
    require_once 'connection.php';
      $query = "INSERT INTO donation (firstname,lastname,email,number,address,description,donation_type,image) VALUES ('$firstname','$lastname','$email','$number','$address','$description','$donation_type','$fname')";
      if (mysqli_query($connection, $query)) {
         // header("location:list_contact-info.php");
      } else {
          echo "Error inserting data: " . mysqli_error($connection);
      }
  }
}


?>   

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/donate.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo3.png" alt="logo"><p>Dog Adoption System</p></a>
                </div>
                <div class="links">
                    <a href="index.php">Home</a>
                    <a href="About-us.php">About-Us</a>
                    <a href="Animals.php">Animals</a>
                    <a href="Contact.php">Contact</a>
                    <a id="Donate"  href="Donation.php">Donate</a>
                    <a href="Admin_login.php">Admin</a>
                    <a  href="userregister.php">Register</a>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="application-forms">
        <div class="container">
            <form  method = "post" action=""  enctype="multipart/form-data">
           
                        <h4>Donation Form</h4>
                    <div class="box1"> 
                                <div class="first-name">
                                    <label for="firstname">Applicant First Name</label><br> <br>
                                    <input type="text" name="firstname" id="firstname" placeholder="Enter First Name"  value="<?php echo isset($firstname)?$firstname: '' ?>">
                                    <?php if (isset($err['firstname'])) { ?>
                                        <span class="error"><?php echo $err['firstname'] ?></span>
                                    <?php } ?>
                                    
                                    
                                </div>
                                <div class="last-name">
                                    <label for="lastname">Applicant Last Name</label><br><br>
                                    <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name" value="<?php echo isset($lastname)?$lastname: '' ?>">
                                    <?php if (isset($err['lastname'])) { ?>
                                        <span class="error"><?php echo $err['lastname'] ?></span>
                                    <?php } ?>
                                
                                </div>
                            </div>
                            <div class="box2">   
                                <div class="email">
                                    <label for="email">Email Address</label><br><br>
                                    <input type="email" name="email" id="email" placeholder="Enter Email" value="<?php echo isset($email)?$email: '' ?>">
                                    <?php if (isset($err['email'])) { ?>
                                        <span class="error"><?php echo $err['email'] ?></span>
                                    <?php } ?>
                                    
                                    
                                </div>
                                
                            <div class="Mobile-Number">
                                    <label for="number">Mobile Number</label><br><br>
                                    <input type="phone" name="number" id="number" placeholder="Enter Mobile Number" value="<?php echo isset($number)?$number: '' ?>">
                                    <?php if (isset($err['number'])) { ?>
                                        <span class="error"><?php echo $err['number'] ?></span>
                                    <?php } ?>
                                   
                                
                                </div>
                            </div>
                            <div class="box3">   
                                <div class="address">
                                    <label for="address">Address</label><br><br>
                            <input type="text" name="address" id="address" placeholder="Enter address"  value="<?php echo isset($address)?$address: '' ?>">
                                    <?php if (isset($err['address'])) { ?>
                                        <span class="error"><?php echo $err['address'] ?></span>
                                    <?php } ?>
                                </div>
                                <div class="Donation-Item">
                                    <label>Donation-items</label><br><br>
                                    <select  name="donation_type"  placeholder="Select Donation_Items" style="padding:10px;" >
                                        <option >select donation_type</option>
                                            <option value="clothes">clothes</option>
                                            <option value="money"> money</option>
                                            <option value="Food">Food</option>
                                        </select>
                                    </div>

                               
                                </div>
                                <div class="box4">
                                <div class="image">
                                    <label>Receipt</label>
                                        <input type="file" name="photo" value="<?php echo isset($fname)?$fname:''?>">
                                <?php  if (isset($err['photo'])){?>
                                <span class="error"><?php echo $err['photo'] ?></span>
                                <?php }?>
                                    </div>
                                   <div class="description">
                                <label>Description</label>
                                <textarea placeholder="Type Message" name="description"> <?php echo isset($description)?$description:''?></textarea> 
                                <?php  if (isset($err['description'])){?>
                            <span class="error"><?php echo $err['description'] ?></span>
                            <?php }?>
                                </div>
                                </div>

                                <div class="btn">
                                    <input type="submit" name="btnlogin" id="btnlogin" value="SUBMIT">
                                </div> 
                            </div>
                           
                </form>
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