<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
      table {
  
  background-color: rgb(142, 0, 155);
  margin-top: 10%;
  margin-left: 20%;
  margin-bottom: 10%;
  padding: 2px;
  width: 60%;
  height: auto;
  top: 50%;
  left: 50%;
  border-radius: 10px;
  backdrop-filter: blur(1500px);
  box-shadow: 20px 20px 80px rgba(8, 7, 16, 0.6);
}
table th{
  color: yellow;
  border: 2px dotted rgb(38, 255, 30);
  padding: 10px;
  margin: 10px;
  text-align: center;
  border-radius: 7px;
}
table td{
  color: rgb(253, 253, 253);
  border: 2px dotted gray;
  padding: 10px;
  margin: 10px;
  text-align: center;
  background-color: #50aaa3;
  border-radius: 4px;
}

    </style>
  </head>
  <body>
    <header>
      <nav>
        <img class="logo" src="img/logo.svg" alt="my img" />
        <ul>
          <a href="index.html"><button class="btn">Home</button></a>
          <a href="student.php"><button class="btn">Student</button></a>
        </ul>
      </nav>
      <marquee behavior="" direction="left"
        ><b>Notice:</b>20% off for all student in Seikh Hasina National
        Institute of Youth Development</marquee
      >
    </header>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>User Name</th>
        <th>Password</th>
      </tr>

      <?php
      $dbHost = 'localhost'; 
      $dbUsername = 'root';
      $dbPassword = '';
      $dbName = 'test';

      $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM registration";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["number"] . "</td>";
          echo "<td>" . $row["userName"] . "</td>";
          echo "<td>" . $row["password"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No data found</td></tr>";
      }

      $conn->close();
      ?>

    </table>
    <footer>
      <p><strong>© Abdur Rahman Zubayer</strong></p>
    </footer>
  </body>
</html>
