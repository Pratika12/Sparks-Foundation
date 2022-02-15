<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="https://internship.thesparksfoundation.info/assests/img/logo.png">

    <title>Transfering Money</title>
    <style>
        body
        {
            background:white;
            text-align:center;
        }
        button
        {
            align-items:center;
        }
        a
        {

            color:white;
        }
        a:hover
        {
            color:#C1DEAE;
            text-decoration:none;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $Sender_Account=$_GET['id'];
            $Receiver_Account=$_POST['to'];
            $Amount=$_POST['Amount'];

            $servername="localhost";
            $username="root";
            $password="";
            $database="bank";
    
            $conn=mysqli_connect($servername,$username,$password,$database);
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }
            $Sender_Account=substr($Sender_Account,1,13);
            $sql="Select `Current Balance` from customers where `Account Number` like '$Sender_Account';";
            $result=mysqli_query($conn,$sql);
            $bal;
            while($row=mysqli_fetch_array($result))
            {
                $bal= $row['Current Balance'];
            }
            if(empty($Amount))
            {
                echo "<div class='alert alert-warning' role='alert'>Invalid Amount</div>";
            }
            else if($bal>$Amount)
            {
                $sql="update customers set `Current balance`= ('$bal'-'$Amount') where `Account Number` like ('$Sender_Account');";
                mysqli_query($conn,$sql);
                $vari=$bal + $Amount;
                $sql="update customers set `Current balance`= `Current balance`+'$Amount' where `Account Number` like ('$Receiver_Account');";
                mysqli_query($conn,$sql);
                $sql="insert into transactions values('$Sender_Account','$Receiver_Account','$Amount');";
                mysqli_query($conn,$sql);
                echo "<div class='alert alert-success' role='alert'> Money is transferred successfully </div>";
            }
            else
            {
                echo "<div class='alert alert-danger' role='alert'>Insufficient Amount</div>";
            }
        }
    ?>
    <button class="btn btn-dark btn-lg"><a href="ViewAllCust.php">OK</a></button> 
</div>   
</body>
</html>
