<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "23bcs048";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$customer_name = $_GET['customer_name'];

$sql = "SELECT c.customer_name, c.customer_street, c.customer_city
        FROM customer c
        WHERE c.customer_name = '$customer_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $customer_street = $row['customer_street'];
    $customer_city = $row['customer_city'];
} else {
    $customer_street = "";
    $customer_city = "";
    echo "No data found for this customer";
}

$conn->close();
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
.form-group {
    margin-bottom: 20px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="tel"],
  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
  }
  
  input[type="checkbox"] {
    margin-right: 5px;
  }
  
  .button4 {
    margin-left: 142px;

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
                <a href=""></a>
                <td><a href="project.html">DASHBOARD |</a></td>
                <td><a href="account.html">OPEN A/C |</a></td>
                <td><a href="project.html">LOAN |</a></td>
                <td><a href="project.html">DEPOSIT</a></td>
            </tr>
         </table>
        </div>
      </div>
      <br />
      <br />
      <br>

    <center> <h1>Depositor Details</h1></center>  
      
      <div class="form-container">
      <center>
            <h2><u>Depositor Details</u></h2>
          </center>
          <div class="form-group">
    <font size ="3.5px" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" >
        <b> Customer Name : </b>
        <?php echo $customer_name; ?><br><br>
        <b> Address : </b>
        <?php echo $customer_street; ?><br><br>
        <b> City : </b>
        <?php echo $customer_city; ?><br><br>
    </font>
        </div>
      </div>

      

</body>
</html>