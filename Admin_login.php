<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; */
        /* } */
        .navbar #Admin{
    background-color: yellowgreen;
    border-radius: 10px;
    color: white;
  }
        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            display:flex;
        }

        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            display:flex;
        }

        input[type="submit"] {
            display: block;
            width: 80%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            /* background-color: #0056b3; */
        }
    footer{
    position: absolute;
    bottom: 1;
    left: 0;
    right: 0;
    background-color: #111;
    height: auto;
    width: 100vw;
    font-family: "open Sans";
    padding: 20px;
    color: #fff;
}
.footer-content{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}
.footer-content h3{
    font-size: 1.8rem;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 2rem;

}
.footer-content p{
    max-width: 500px;
    margin: 10px auto;
    line-height: 28px;
    font-size: 14px;

}
.socials{
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1rem 0 3rem 0;
}
.socials li{
    margin: 0 10px;
}
.socials a{
    text-decoration: none;
    color: #fff;
}
.socials a i{
    font-size: 1.1rem;
    transition: color.4s ease;
}
.socials a:hover i{
    color: aqua;
}
        
        </style>
</head>
<body>
<div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="homepage.php"><img src="images/logo3.png" alt="logo"><p>Dog Adoption System</p></a>
                </div>
                <div class="links">
                    <a href="homepage.php">Home</a>
                    <a href="About-us.php">About-Us</a>
                    <a  href="Animals.php">Animals</a>
                    <a href="Contact.php">Contact</a>
                    <a href="Donation.php">Donate</a>
                    <a id="Admin"href="Admin_login.php">Admin</a>
                    <a href="userregister.php">Register</a>
                </div>
            </div>
        </div>
    </div>
    
    <h1>Admin Login</h1>
    <form action="Admin_login_check.php" method="post">
        <label for="email">email:</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
        </form>
        <br><br><br><br><br> <br><br><br><br><br>
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
</body>
</html>
  
    