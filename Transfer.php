<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Ubuntu&display=swap"rel="stylesheet" />

    <link rel="icon" href="https://internship.thesparksfoundation.info/assests/img/logo.png">

    <title>Transfer Money</title>
    <style>
        body
        {
            background-color: #516BEB;
            color: white;
            font-family: 'Montserrat-Bold', sans-serif;
            text-align:center;
            font-size:15px;
            font-weight:700;
        }
        .container-fluid
        {
            padding:10%;
        }
        table
        {
            margin-top:10%;
        }
        .btn
        {
            width:10%;
            height:10%;
            font-size:20px;
        }
        .amount-label
        {
            margin-top:3%;
        }
        select.form-control:not([size]):not([multiple]) 
        {
            height:35px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <form method="post" action="Transfer2.php?id=<?php echo $_GET['id'];?>">
        <h1>Transfer To:</h1>
        <select name='to' id="selections" class="form-control browser-default custom-select" required>
        <option selected>Choose</option>
            <?php
                $id=$_GET['id'];
                $servername="localhost";
                $username="root";
                $password="";
                $database="bank";
                $conn=mysqli_connect($servername,$username,$password,$database);
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sid=substr($id,1,14);
                $sql = "Select `Account Number` from customers where `Account Number`!= '$sid' order by `Account Number`;";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                $rowcount=mysqli_num_rows($result);
                while($rows = mysqli_fetch_assoc($result)) 
                {
            ?>
                <option value="<?php echo $rows['Account Number'];?>"><?php echo $rows['Account Number'];?></option>
            <?php
                }
            ?>
        </select>
        <br><h1 class="amount-label">Amount</h1>
        <input type="text" class="form-control" name="Amount"><br>
        <input class="submit btn btn-success btn-lg" type="submit">
    </form>

    <table class="table table-bordered table-dark table-hover table-striped table-responsive-md">
        <tr>
        <th>Account Number</th>
        <th>Account Holder Name</th>
        <th>Branch Name</th>
        <th>Current Balance</th>
        <th>Contact Number</th>
        <th>Email</th>
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
            $sql="Select * from customers where `Account Number`= '$sid';";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result))
            {
        ?>
            <tr>
                <td><?php echo $row['Account Number']?></td>
                <td><?php echo $row['Account Holder Name']?></td>
                <td><?php echo $row['Branch Name']?></td>
                <td><?php echo $row['Current Balance']?></td>
                <td><?php echo $row['Contact Number']?></td>
                <td><?php echo $row['Email']?></td>
            </tr>
        <?php
            }
        ?>
    </table>
</div>
</body>

</html>
