<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDER MANAGEMENT SYSTEM</title>
    <style type="text/css">
        #text {
            height: 30px;
            border-radius: 8px;
            padding: 6px 10px;
            border: solid 1px #ccc;
            width: 100%;
            font-size: 16px;
            box-sizing: border-box;
        }

        #button {
            padding: 12px 20px;
            color: white;
            background-color:grey;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        #button:hover {
            background-color: #0056b3;
        }

        #box {
            background-color: #f9f9f9;
            margin: 50px auto;
            width: 320px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e9e9e9;
            margin: 0;
        }
    </style>
</head>
<body>
    <div id="box">
        <h1>Welcome to the Canteen, <?php echo $user_data['user_name']; ?>.</h1>
        <ul>
            <li>adobo - ₱60</li>
            <li>pinakbet - ₱60</li>
            <li>rice - ₱50</li>
        </ul>
        <form action="receipt.php" method="post">
            <label for="food">Choose your order:</label>
            <select name="food" id="food" class="text" required>
                <option value="" disabled selected>Select...</option>
                <option value="adobo">adobo</option>
                <option value="pinakbet">pinakbet</option>
                <option value="rice">rice</option>
            </select><br><br>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" class="text" required><br><br>
            <label for="cash">Cash payment:</label>
            <input type="number" name="cash" id="cash" min="0" class="text" required><br><br>
            <input type="submit" value="Place Order" id="button"><br><br>
            <a href="logout.php">Logout here</a>
        </form>
    </div>
</body>
</html>
