<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="icon" href="https://internship.thesparksfoundation.info/assests/img/logo.png">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Ubuntu&display=swap"
        rel="stylesheet" />

    <title>Transaction History</title>
    <style>
        body
        {
            font-family: 'Ubuntu', sans-serif;
            margin-top: 1%;
            background:#516BEB;
        }
        table
        {
            text-align: center;
            width:80%;
        }
        h1
        {
            padding:50px;
            text-align: center;
            width:50%;
            margin: 10px auto auto auto;
            color:white;
            font-weight:800;
        }
        div
        {
            width:60%;
            margin:auto;
        }
    </style>
</head>
<body>  
    <h1>TRANSACTION HISTORY</h1> 
    <div> 
    <table class="table table-bordered table-dark table-hover table-striped table-responsive-md">
        <tr>
            <th scope="row" >#</th>
            <th>Sender's Account</th>
            <th>Receiver's Account</th>
            <th>Amount</th>
        </tr>
        <?php
            $servername="localhost";
            $username="root";
            $password="";
            $database="bank";
            $conn=mysqli_connect($servername,$username,$password,$database);
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql="Select * from transactions;";
            $result=mysqli_query($conn,$sql);
            $i=1;
            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>". $i. "</td>";
                echo "<td>" . $row["Sender's Account Number"]."</td>";
                echo "<td>" . $row["Receiver's Account Number"]."</td>";
                echo "<td>" . $row['Amount']."</td>";
                echo "<tr>";
                $i=$i+1;
            }
        ?>
    </table>
    </div>
   
</body>
</html>
