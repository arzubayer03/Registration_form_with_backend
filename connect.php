<style>
    button {
  margin-top: 10px;
  margin-left: 20%;
  width: 300px;
  position: relative;
  background-color: blue;
  color: #fbfaff;
  padding: 15px 0;
  font-size: 18px;
  font-weight: 600;
  border-radius: 5px;
  cursor: pointer;
}
button:hover {
  background-color: rgb(187, 255, 0);
  color: black;
  width: 300px;
}
h1{
    text-align: center;
    color: white;
    background-color: green;
}
</style>
<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Database connection
 $conn = new mysqli('localhost', 'root', '', 'test');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare('INSERT INTO registration (name, email, number, userName, password, confirm_password) VALUES (?, ?, ?, ?, ?, ?)');
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }
    
    $stmt->bind_param('ssisss', $name, $email, $number, $userName, $password, $confirm_password);
    if (!$stmt->execute()) {
        die('Execute failed: ' . $stmt->error);
    }

    echo '<h1>Registration Successful.</h1><br> <a href="index.html"><button>HOME</button><a href="student.php"><button>Student</button>';
    
    $stmt->close();
    $conn->close();
}
?>