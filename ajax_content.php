<?php
 
    $output='ss';
    $message='';
    $total= 0;
    $billno=1;
    $itemsname=array(); 
    $itemsQuantity=array();
    $itemsAmount=array();
    $itemsFrom=array();

    if(isset($_POST['itemsname']) && isset($_POST['itemsQuantity']) && isset($_POST['itemsAmount']) && isset($_POST['itemsFrom'])){
            
        $itemsname=$_POST['itemsname'];
        $itemsQuantity=$_POST['itemsQuantity'];
        $itemsAmount=$_POST['itemsAmount'];
        $itemsFrom=$_POST['itemsFrom'];
        // print_r($itemsname);
        // print_r($itemsQuantity);
        // print_r($itemsFrom);
        
        $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
        if(!$con){
            die("Connection error ".mysqli_connect_error());
        }

        $sql = "SELECT billnumber FROM sri_recepit ORDER BY billnumber DESC LIMIT 1";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $billno=$row["billnumber"];
                $billno++;
            }
            
        }else{
            $billno=1;
        }
        $date = date('Y-m-d H:i:s');
        for($i=0;$i<count($itemsAmount);$i++){
            $sql="Insert into sale_items (billno,items,quantity,amount,itemsfrom,billdate) values('$billno','$itemsname[$i]','$itemsQuantity[$i]','$itemsAmount[$i]','$itemsFrom[$i]','$date')";
            $result = mysqli_query($con, $sql);
            $sql="Insert into selected_items (items,quantity,amount) values('$itemsname[$i]','$itemsQuantity[$i]','$itemsAmount[$i]')";
            $result = mysqli_query($con, $sql);
        }

        for($i=0;$i<count($itemsAmount);$i++){
            $total=$total+$itemsAmount[$i];
        }

        $date = date('Y-m-d H:i:s');
        $time="".date("h:i a");

        $sql="Insert into sri_recepit (billnumber,date,time,totalamount) values('$billno','$date','$time','$total')";
        $result = mysqli_query($con, $sql);
        
        // print_r($result);
        
    }else{

    }
    
        $data["output"]=$output;
        $data["total"]=$total;

    echo json_encode($data);       
  ?>