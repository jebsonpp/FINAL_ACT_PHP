<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
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
            background-color: grey;
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
    <?php
        $food = $_POST['food'];
        $quantity = $_POST['quantity'];
        $cash = $_POST['cash'];
        
        $prices = array(
            "adobo" => 60,
            "pinakbet" => 60,
            "rice" => 50
        );
        
        $total_cost = $prices[$food] * $quantity;
        
        $change = $cash - $total_cost;
        
        echo "<h1>Receipt:</h1>";
        echo "<h2>You ordered: $food</h2>";
        echo "<h3>Quantity: $quantity</h3>";
        echo "<h3>The total cost is: ₱$total_cost</h3>";
        echo "<h3>Your change is: ₱$change</h3>";
        echo "<p>Thank you for your order!</p>"; 
    ?>
        <a id="button" href="logout.php">Logout here</a> <br> 
        <br> <br> 
        <a id="button" href="index.php">Do you want to order again?</a> <br> 
    </div>
</body>
</html>
