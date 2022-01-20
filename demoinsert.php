<?php
   require_once "dbConfig.php";
   if(!$con){
       die("Connection error ".mysqli_connect_error());
   }

   $sql = "SELECT * FROM nonbeverages";
   $result = mysqli_query($con, $sql);

   if (mysqli_num_rows($result) > 0) {

       while($row = mysqli_fetch_assoc($result)) {

        $itemsname=$row["itemsname"];
        $amount=$row["amount"];
        $buyquantity=$row["buyquantity"];
        $sellquantity=$row["sellquantity"];
        $totalamount=$row["totalamount"];
        $tamilname=$row["tamilname"];

        $sql11 = "";
        $result1 = mysqli_query($con, $sql11);
        //    $billno=$row["billnumber"];
        //    $billno++;
       }
       
   }

    // $sql = "TRUNCATE TABLE sri_beverages";
    // $result=mysqli_query($con,$sql);
    
?>