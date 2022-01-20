<?php
   echo "<script>location.href='login.php'</script>";

   require_once "dbConfig.php";
   
   if(!$con){
      die("Connection error ".mysqli_connect_error());
   }
   $date = date('Y-m-d');
   $currentDate;

   $sql = "UPDATE beverages SET sellquantity=0 and buyquantity=0";
   $result = mysqli_query($con, $sql);

   $sql = "SELECT * FROM cron where id=1";
   $result = mysqli_query($con, $sql);

   if (mysqli_num_rows($result) > 0) {

      while($row = mysqli_fetch_assoc($result)) {
            $currentDate=$row["date"];
      }
   }
   echo $currentDate;
   echo $date;
   
   if($currentDate<=$date){
      $datetime = new DateTime('tomorrow');
      $tmwDate=$datetime->format('Y-m-d');
      echo $tmwDate;
      $sql = "UPDATE cron SET date='$tmwDate' WHERE id=1";
      $result = mysqli_query($con, $sql);
      if($result){
         
         $sql = "UPDATE beverages SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);
         $sql = "UPDATE nonbeverages SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);
         $sql = "UPDATE bites SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);
         $sql = "UPDATE juices SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);
         $sql = "UPDATE parcel SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);


         $sql = "UPDATE beverages_1 SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);
         $sql = "UPDATE nonbeverages_1 SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);
         $sql = "UPDATE bites_1 SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);
         $sql = "UPDATE juices_1 SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);
         $sql = "UPDATE parcel_1 SET sellquantity=0 and buyquantity=0";
         $result = mysqli_query($con, $sql);

      }else{
         echo 'Failed';
      }
   }else{
      echo 'date does not match';
   }
   
?>