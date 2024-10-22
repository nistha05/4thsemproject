<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost"; //  database server
    $username = "root"; //  database username
    $password = ""; //   database password
    $dbname = "dog-adoption-project"; //  database name

    // Create a database connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $phone_number = $_POST["phone_number"];

    // Insert data into the database
    $sql = "INSERT INTO users (name, email, password, phone_number) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $password, $phone_number);

    if ($stmt->execute()) {
        // Registration successful
        $stmt->close();
        $connection->close();

        // Delay the redirect for 3 seconds (adjust the delay time as needed)
        sleep(3);

        // Redirect to the login page
        header("Location: userlogin.php");
        exit();
    } else {
        // Registration failed
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $connection->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Global styles */
        body,
        html {
        height: 100%;
        background-repeat: no-repeat;
        background-image: linear-gradient(rgba(88, 194, 236, 0.111), rgba(112, 102, 227, 0.007));
         }
         *{
    margin: 0;
    padding: 0;
  }
  .navbar #Register{
    background-color: yellowgreen;
    border-radius: 10px;
    color: white;
  }
  
       
        h1 {
            margin-top: 20px;
            color: #333;
            text-align: center;
        }

        /* Form styles */
        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            display: flex;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;

        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            display:block;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
            display:flex;
        }

        input[type="submit"]:hover {
            /* background-color: #555; */
        }

        /* Registration link styles */
        p {
            margin-top: 10px;
            font-size: 14px;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            color: #555;
        }
    </style>
    <link rel="stylesheet" href="style.css">
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
                    <a  href="donation.php">Donate</a>
                    <a href="Admin_login.php">Admin</a>
                    <a id="Register" href="userregister.php">Register</a>
                </div>
            </div>
        </div>
    </div>
    <h1>User Registration</h1>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required>
        <br>

        <input type="submit" value="Register" name="REQUEST_METHOD">
    
    <p>Already have an account? <a href="userlogin.php">Login here</a></p>
    </form>
</body>
</html>
