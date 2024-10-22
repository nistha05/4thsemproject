

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize form inputs
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $number = htmlspecialchars($_POST["number"]);
    $address = htmlspecialchars($_POST["address"]);
    $adoption_date = $_POST["adoption_date"];
    $message = htmlspecialchars($_POST["message"]);
    $dog_category = htmlspecialchars($_POST["dog_category"]);
   

  
    $adoption_date = $_POST['adoption_date']; // Replace with your actual form field name

// Get the current date in UNIX timestamp format
$current_timestamp = time();

// Convert the adoption_date to a UNIX timestamp
$adoption_timestamp = strtotime($adoption_date);

// Compare the adoption_date to the current date
if ($adoption_timestamp < $current_timestamp) {
    // Date is in the past, show an error message or take appropriate action
    echo "Error: Adoption date cannot be in the past.";
} else {
    // Date is valid, proceed with the database insertion
    // Your database insertion code goes here
}



    // Insert the data into your database (you need to set up your database connection)
    // Example code for database insertion:
    
        $servername = "localhost"; // Change this to your database server
        $username = "root"; // Change this to your database username
        $password = ""; // Change this to your database password
        $dbname = "dog-adoption-project";
    
    $connection = new mysqli($servername, $username, $password, $dbname);
    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
    $sql = "INSERT INTO adptions ( name, email, number, address, adoption_date, dog_category,message)
    VALUES ('$name', '$email', '$number', '$address', '$adoption_date','$dog_category','$message')";
    
    if ($connection->query($sql) === TRUE) {
        echo "Adoption request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
    
    $connection->close();
    
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Adoption Form</title>
    <link rel="stylesheet" href="styles.css">
    <!-- <link rel="stylesheet" href="css/homepage.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: grid;
    gap: 10px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea,
select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
<body>
    <div class="header" >
        <div class="container">
            <div class="navbar">
                <!-- <div class="logo">
                    <a href="index.php"><img src="images/logo3.png" alt="logo"><p>Dog Adoption System</p></a>
                </div> -->
                <!-- <div class="links">
                    <a href="homepage.php">Home</a>
                    <a href="About-us.php">About-Us</a>
                    <a id="Animals" href="Animals.php">Animals</a>
                    <a href="Contact.php">Contact</a>
                    <a href="Donation.php">Donate</a>
                    <a href="Admin_login.php">Admin</a>
                    <a  href="userregister.php">Register</a> -->
                
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <h1>Dog Adoption Form</h1>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="number">Phone Number:</label>
            <input type="tel" id="number" name="number" required>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
            
            <label for="Adoption_date">Adoption Date:</label>
            <input type="date" id="adoption_date" name="adoption_date" min="<?php echo date('Y-m-d'); ?>" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea>
            
            <label for="dog_category">Dog Type:</label>
            <select id="dog_category" name="dog_category" required>
            <option value="japnese spintch">japnese spintch</option>
            <option value="Golden Retriver">Golden Retriver</option>
            <option value="Labrador">Labrador</option>
            <option value="indies">indies</option>
            <option value="pitbull">pitbull</option>
            <option value="Pomerian">Pomerian</option>
            <option value="Husky">Husky</option>
            </select>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
