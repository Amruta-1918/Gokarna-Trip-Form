<?php
if (isset($_POST['name'])) { // Change 'Name' to 'name' to match form field names
    $server = "localhost";
    $username = "root";
    $password = "";

    // Connect to the database
    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Connection to database failed due to " . mysqli_connect_error());
    }

    // Retrieve form data
    $Name = $_POST['name'];
    $Mobile = $_POST['mobile'];
    $Gender = $_POST['gender'];
    $Email = $_POST['email'];
    $OtherInfo = $_POST['info'];

    // SQL query
    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Mobile`, `Gender`, `Email`, `OtherInfo`) 
            VALUES ('$Name', '$Mobile', '$Gender', '$Email', '$OtherInfo');";

    // Output SQL for debugging
    echo $sql;

    // Execute query
    if ($con->query($sql) === true) {
        echo "Successfully inserted";
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gokarna Trip Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        /* Page styling with background image */
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('your-company-image.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
        }

        /* Overlay to adjust form background transparency */
        .form-container {
            background: rgba(255, 165, 0, 0.85); /* Transparent orange overlay */
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            color: white;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: white;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #004b8d; /* ICICI Prudential blue */
            border: none;
            color: white;
            font-size: 18px;
            font-weight: 700;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #00376b;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Gokarna Trip Form</h2>
        <form id="tripForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile No:</label>
                <input type="tel" id="mobile" name="mobile" required pattern="[0-9]{10}" title="Enter a valid 10-digit mobile number">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="info">Enter Your Other Info:</label>
                <input type="text" id="info" name="info">
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById("tripForm").addEventListener("submit", function(event) {
            event.preventDefault();
            alert("Your trip is confirmed!");
            document.getElementById("tripForm").reset();
        });
    </script>

</body>
</html>
<!-- INSERT INTO `trip` (`Name`, `Mobile No`, `Gender`, `Email`, `OtherInfo`) VALUES ('test ', '5454545454', 'male', 'g@mao.com', 'adfefwf'); -->
