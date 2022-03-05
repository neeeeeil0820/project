<?php
include('server.php')
?>
<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Water Billing System</title>
 </head>
  
<body>
	<div class="header">
	   <div class="SysName">Water Billing System</div>
	   <div class="logout">
       <p><a href="index.php?logout='1'"> <button type="submit" class="btn" name="logout1">Log Out</button> </a> </p>
	   </div>
	</div>

	<div class="wrapper">
	  <form method="POST">
  	     <div class="search">
            <input type="text" name="cus_id" value="<?php if(isset($_POST['cus_id'])){echo $_POST['cus_id'];} ?>" class="searchTerm" placeholder="Input customer number">
            <button type="submit" name="search" class="searchButton"><i class="fa fa-search"></i></button>
   	    </div>
	  </form>
	</div>

<?php 
$db = mysqli_connect("localhost","root","","waterbilling");
    if(isset($_POST['search'])){
        $cus_id = $_POST['cus_id'];
        $query = "SELECT * FROM customer WHERE cus_id ='$cus_id' ";
        $query_run = mysqli_query($db, $query); 

         while($row = mysqli_fetch_array($query_run))
        {
            ?>

                <div class="result"><form method="POST">
                     <label> Customer ID:</label>
                     <input type="text" name="cus_id" value="<?php echo $row["cus_id"] ?>" style="margin-left: 190px; width: 349px;" readonly/><br>
                     <label> Last Name:</label>
                     <input type="text" name="lname" value="<?php echo $row["lname"] ?>" style="margin-left: 203px; width: 349px;" readonly/><br>
                     <label> First Name:</label>
                     <input type="text" name="fname" value="<?php echo $row["fname"] ?>" style="margin-left: 203px; width: 349px;" readonly/><br>
                     <label> Address:</label>
                     <input type="text" name="address" value="<?php echo $row["address"] ?>" style="margin-left: 221px; width: 349px;" readonly/><br>
                     <label> Contact Number:</label>
                     <input type="text" name="contno" value="<?php echo $row["contno"] ?>" style="margin-left: 153px; width: 349px;" readonly/><br>
                     <label> Email:</label>
                     <input type="text" name="email" value="<?php echo $row["email"] ?>" style="margin-left: 243px; width: 349px;" readonly/><br>
                     <input type="button" class="check" name="check" value="Check Bill" >
                 </form></div>
            <?php
        }
    }
?>       

<?php 
$db = mysqli_connect("localhost","root","","waterbilling");
    if(isset($_POST['check'])){
        $sql = ("SELECT bill.billno, bill.duedate, bill.amount FROM bill JOIN customer ON bill.cus_id = customer.cus_id");
        $query_run = mysqli_query($db, $sql); 

         while($r = mysqli_fetch_array($query_run))
        {
            ?>
                <div class="form-popup" id="myForm"><form action="index.php" method="POST" class="form-container">
                     <label> Bill Number:</label>
                     <input type="text" name="billno" value="<?php echo $r["billno"] ?>" style="margin-left: 190px; width: 349px;" readonly/><br>
                     <label> Due date:</label>
                     <input type="text" name="duedate" value="<?php echo $r["duedate"] ?>" style="margin-left: 203px; width: 349px;" readonly/><br>
                     <label> Amount:</label>
                     <input type="text" name="amount" value="<?php echo $r["amount"] ?>" style="margin-left: 203px; width: 349px;" readonly/><br>
                     <input type="submit" class="btn-123" value="Send" name="send" id="send">
                     <input type="button" class="btn-123" value="Cancel">
                 </form></div>
            <?php
        }
    }
?>       

  </div>
  <script src="functions.js"></script>
</body>
</html>