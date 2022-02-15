<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon-->
    <link rel="icon" href="https://internship.thesparksfoundation.info/assests/img/logo.png">

    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
    <!--Embed Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Ubuntu&display=swap"
        rel="stylesheet" />
    
    <title>Customers</title>
    <style>
        body
        {
            font-family: 'Ubuntu', sans-serif;
            margin-top: 2px;
            background:#516BEB;
        }
        table
        {
            text-align: center;
            margin-top:50px;
            width:80%;
        }
        .table td
        {
            padding-top:5px;
            padding-bottom:5px;
        }
        h1
        {

            text-align: center;
            width:50%;
            margin:auto;
            color:white;
            font-weight:800;
        }
        div
        {
            width:80%;
            margin:auto;
        }

        /* NAVBAR */
        .navbar {
            padding: 0 0 4rem 0;
        }

        .navbar-brand {
            font-size: 3rem;
            font-family: 'Ubuntu', sans-serif;
            font-weight: bold;
        }

        .nav-item {
            padding: 0 18px;
        }

        .nav-link {
            font-size: 1.2rem;
            font-family: 'Montserrat-Light', sans-serif;
        }
        .container-fluid
        {
            padding-top:3%;
            padding-left:15%;
            padding-right:15%;
        }
    </style>
</head>
<body>  
    <!-- NavBar -->
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="">UK Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Bank.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ContactUs.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            </ul>
        </div>
    </nav>
    </div>
    <h1>CUSTOMER DETAILS</h1>  
    <div>
    <!--VIEW ALL CUSTOMERS -->
    <table class="table table-bordered table-dark table-hover table-striped table-responsive-md">
        <thead>
            <tr>
                <th scope="row" >#</th>
                <th>Account Number</th>
                <th>Account Holder Name</th>
                <th>Branch Name</th>
                <th>Current Balance</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Transfer</th>
            </tr>
        </thead>
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
            $sql="Select * from customers;";
            $result=mysqli_query($conn,$sql);
            $i=1;
            while($row=mysqli_fetch_array($result))
            {
        ?>  
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $row['Account Number']?></td>
                    <td><?php echo $row['Account Holder Name']?></td>
                    <td><?php echo $row['Branch Name']?></td>
                    <td><?php echo $row['Current Balance']?></td>
                    <td><?php echo $row['Contact Number']?></td>
                    <td><?php echo $row['Email']?></td>
                    <td><a href="Transfer.php?id= <?php echo $row['Account Number'] ;?>"> <button type="button" class="btn btn-outline-success">Transact</button></a></td> 
                </tr>

        <?php 
            $i=$i+1;
            }
        ?>
    </table>
    </div>
</body>
</html>