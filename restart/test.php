<?php
    require_once 'config/database.php';
    

   

        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cname = $conn->real_escape_string(trim($_POST['cname']));

        $sql = "SELECT * FROM customer WHERE cname = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $cname);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Customer exists!";
        } else {
            echo "Customer does not exist.";


        }

         $stmt->close();
        }
        $conn->close();
    
    
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Input Check</title>
</head>
<body>
    <form action="test.php" method="POST">
        <label for="cname">Customer Name:</label>
        <input type="text" id="cname" name="cname" required>
        
        <input type="submit" value="test">
    </form>
</body>
</html>