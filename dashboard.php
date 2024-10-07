<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "23bcs048";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT d.customer_name, a.account_number, a.balance, c.customer_name, c.customer_street, c.customer_city
        FROM depositor d
        JOIN account a ON d.account_number = a.account_number
        JOIN customer c ON d.customer_name = c.customer_name";
$result = $conn->query($sql);

$depositorsArray = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $depositorsArray[] = array(
            'customer_name' => $row['customer_name'],
            'account_number' => $row['account_number'],
            'balance' => $row['balance'],
        );
    }
} else {
    echo "No data found in Depositors table";
}

$sql = "SELECT b.customer_name, b.loan_number, l.amount 
        FROM borrower b
        INNER JOIN loan l ON b.loan_number = l.loan_number";
$result = $conn->query($sql);

$borrowersArray = array();
if (!$result) {
    echo "Error: " . $conn->error;
} else {
    $borrowersArray = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $borrowersArray[] = array(
                'customer_name' => $row['customer_name'],
                'loan_number' => $row['loan_number'],
                'amount' => $row['amount'],
            );
        }
    } else {
        echo "No data found in Borrower table";
    }
}

$conn->close();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Opening</title>
    <link rel="stylesheet" href="projectstyle.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        
        .head {
            background: aquamarine;
            color: black;
            padding: 10px 20px;
            text-align: center;
        }

        .logo img {
            height: 100px;
        }

        .gui {
            margin: 0;
        }

        .gty table {
            width: 100%;
            border-spacing: 0;
        }

        .gty td {
            padding: 10px;
        }

        .gty a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .gty a:hover {
            color: aquamarine;
        }

        .dashboard-title {
            text-align: center;
            margin: 20px 0;
        }

        .dashboard-title h2 {
            font-size: 24px;
            color: aquamarine;
            margin: 0;
        }

        .tables {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .table-container {
            margin-bottom: 20px;
            width: 45%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .table-container h2 {
            background-color: #003366;
            color: #fff;
            padding: 10px;
            margin: 0;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: aquamarine;
            color: #003366;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
            color: black;
        }

        tr:hover {
            background-color: #e2e2e2;
            
        }

        .details-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .details-link a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<div class="head">
    <div class="logo">
        <img src="https://tse3.mm.bing.net/th?id=OIP.RwbDI3oqpQUipmrdPG9q6gHaFj&pid=Api&P=0&h=180" alt="ayush"/>
    </div>
    <h1 class="gui">
        <b>IIITDM JABALPUR BANK</b>
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
<div class="dashboard-title">
    <h2>Dashboard</h2>
</div>
<div class="tables">
    <div class="table-container">
        <h2>List of Depositors</h2>
        <table border="2">
            <tr>
                <th>Customer Name</th>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Details</th>
            </tr>
            <?php foreach($depositorsArray as $depositor) { ?>
            <tr>
                <td><?php echo $depositor['customer_name']; ?></td>
                <td><?php echo $depositor['account_number']; ?></td>
                <td><?php echo $depositor['balance']; ?></td>
                <td><a href="depositor.php?customer_name=<?php echo $depositor['customer_name']; ?>">Click to View</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="table-container">
        <h2>List of Borrowers</h2>
        <table border="2">
            <tr>
                <th>Customer Name</th>
                <th>Loan Number</th>
                <th>Amount</th>
                <th>Details</th>
            </tr>
            <?php foreach($borrowersArray as $borrower) { ?>
            <tr>
                <td><?php echo $borrower['customer_name']; ?></td>
                <td><?php echo $borrower['loan_number']; ?></td>
                <td><?php echo $borrower['amount']; ?></td>
                <td><a href="borrower.php?customer_name=<?php echo $borrower['customer_name']; ?>">Click to View</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>
