
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
</head>
<body>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
.container{
    max-width: 80%;
    background-color: red;
    padding: 34px;
    margin: 23px;
    margin: auto;

}
.container h3 , p{
    text-align: center;
}
input{
    display: block;
    border: 2px solid black;
    border-radius: 6px;
    outline: none;
    font-size: 15px;
    width: 80%;
    margin: 11px;
    padding: 7px;

}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
    </style>
    <div class="container">
        <h3>welcome to iit us trip form</h3>
        <p>enter your details</p>
        <form action="index.php" method="post" >
        <input type="text" name="name" id="name" placeholder="enter your name ">
        <input type="text" name="age" id="age" placeholder="enter your age ">
        <input type="text" name="gender" id="gender" placeholder="enter your gender ">
        <input type="text" name="email" id="email" placeholder="enter your email ">
        <input type="text" name="phone" id="phone" placeholder="enter your phone ">
        <button class = "btn">Submit</button>
        <button class = "btn">reset</button>
        

    </form>
    
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

    <script>

    </script>
    
</body>
</html>
























<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "base";
$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {
    die("Connection to the database failed: " . mysqli_connect_error());
}

// Assuming form data is sent via POST method for insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Prepare the SQL query for insertion
    $sqlInsert = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `dt`, `tm`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '2023-12-13', '19:26:19')";
    
    // Execute the SQL query for insertion
    $insertResult = mysqli_query($con, $sqlInsert);
    if ($insertResult) {
        echo "Data inserted successfully";
    } else {
        if (mysqli_errno($con) == 1062) {
            echo "Error: Duplicate entry. Data already exists.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

// Perform a query to fetch data from the table for selection
$sqlSelect = "SELECT `name`, `age`, `gender`, `phone` FROM `trip`"; // Adjust table name and fields as per your schema

// Execute the query and store the result
$result = mysqli_query($con, $sqlSelect);

// Check if there are rows returned
if ($result && mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Access each column by its name
        echo "Name: " . $row["name"] . " - Age: " . $row["age"];
        if (isset($row["gender"])) {
            echo " - Gender: " . $row["gender"];
        }
        if (isset($row["phone"])) {
            echo " - Phone: " . $row["phone"];
        }
        echo "<br>";
        // Adjust field names based on your table structure
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($con);
?>
