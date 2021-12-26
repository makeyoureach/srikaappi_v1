<?php
   $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
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

        $sql11 = "insert into nonbeverages_1 (itemsname,amount,buyquantity,sellquantity,totalamount,tamilname) values ('$itemsname',$amount,$buyquantity,$sellquantity,$totalamount,'$tamilname')";
        $result1 = mysqli_query($con, $sql11);
        //    $billno=$row["billnumber"];
        //    $billno++;
       }
       
   }

    // $sql = "TRUNCATE TABLE sri_beverages";
    // $result=mysqli_query($con,$sql);
    
?>