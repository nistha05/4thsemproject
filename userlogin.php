
            
<?php
// Start a session to store user data if login is successful
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dog-adoption-project";

    // Create a database connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Get user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Sanitize user input (prevents SQL injection)
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    // Query to fetch user data
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $connection->query($sql);
     

    if (!empty($email) && !empty($password)) {
        $emaildata = "SELECT * FROM users WHERE email = '$email'";
        $query = $connection->query($emaildata);

        if ($query) {
            $row = mysqli_num_rows($query);

            if ($row) {
                $user_data = mysqli_fetch_assoc($query);

                $_SESSION['email'] = $user_data['email'];
                $_SESSION['c_id'] = $user_data['c_id'];
            header("Location:index.php"); // Redirect to the dashboard or another page
        } else {
            // Password is incorrect
            echo "Incorrect password";
        }
    } else {
        // User not found
        echo "User not found";
    }

    // Close the database connection
    $connection->close();
}
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body,
       html {
   height: 100%;
   background-repeat: no-repeat;
   background-image: linear-gradient(rgba(88, 194, 236, 0.111), rgba(112, 102, 227, 0.007));
 }
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
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
        </style>
</head>
<body>
    <h2>Login Form</h2>
    <form action="" method="POST">
        
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>

            <input type="submit" value="Login" name="REQUEST_METHOD">
            <p>Already have an account? <a href="userregister.php">Register</a></p>
        
       
    </form>
</body>
</html>
