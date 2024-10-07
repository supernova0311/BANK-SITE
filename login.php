<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = '23bcs048';

$connection = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error_message = "Invalid username or password";
    }
}

$connection->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>
    .gui{
        color: black;
    }
   
body{
  
  background-image: url(https://img.freepik.com/free-vector/graph-chart-with-moving-up-arrow-stock-market-financial-investment-diagram-blue-background_56104-1814.jpg?size=626&ext=jpg) ;
  color: aquamarine;
 
  background-attachment: fixed;
 background-size: cover ;

}
    .head{
    border: 2px solid orange;
    background-color: aquamarine;
    border-radius: 5px;
    height: 100px;
    padding-top: 10px;
    font-size: large;
    display: flex;
    justify-content: space-between;
}
.logo{
    justify-content: center;
    display: flex;
    padding-bottom: 10px;
    padding-left: 10px;
}
.gty{
padding-top: 70px;
padding-right: 5px;
color: black;
}
.form-container {
  width: 50%;
  margin: 40px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
label {
  display: block;
  margin-bottom: 10px;
}
input[type="text"] {
  width: 100%;
  height: 40px;
  margin-bottom: 20px;
  padding: 10px;
  border: 1px solid #ccc;
}
button[type="submit"], button[type="reset"] {
  width: 50%;
  height: 40px;
  margin-bottom: 10px;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #4CAF50;
  color: #fff;
  cursor: pointer;
  display: block;
}
button[type="submit"]:hover, button[type="reset"]:hover {
  background-color: #3e8e41;
}
 </style>
</head>

<body>
    <div class="head">
        <div class="logo">
          <img
            src="https://tse3.mm.bing.net/th?id=OIP.RwbDI3oqpQUipmrdPG9q6gHaFj&pid=Api&P=0&h=180"
            alt="ayush"
          />
        </div>
        <h1 class="gui">
          <b><center>IIITDM JABALPUR BANK</center></b>
        </h1>
        <div class="gty">
            <table>
                <tr>
                  <td><a href="project.html">HOME <b>|</b></a></td>
                  <td><a href="project.html">ABOUT US <b>|</b></a></td>
                  <td><a href="login.html">LOGIN <b>|</b></a></td>
                  <td><a href="account.html">OPEN A/C</a></td>
                </tr>
              </table>
        </div>
      </div>
      <br />
      </div>
      <br />
      <br />
      <br>
      <center><h1>LOGIN TO YOUR ACCOUNT</h1></center>
      
      <div class="form-container">
        <form class="login-form" action="login.php" method="post">
          <label for="username"><b>ENTER USERNAME</b></label>
          <input type="text" id="username" name="username" required>

          <label for="password"><b>ENTER YOUR PASSWORD</b></label>
          <input type="text" id="password" name="password" required>
          
       
       
        </form>

        <?php if (isset($error_message)) { ?>
            <div class="error-message-container">
                <div class="error-message">
                    <?php echo $error_message; ?>
                </div>
            </div>
        <?php } ?>
        
      </div>
          
</body>
</html>