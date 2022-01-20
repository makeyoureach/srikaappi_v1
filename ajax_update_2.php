
<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require_once "dbConfig.php";
    $output='ss';
    $message='';
    $total= 0;
    $billno=1;
    $updateid=0;
    $data["output"]='faliure';
    if(isset($_POST['updateid'])&& isset($_POST['updatename'])&& isset($_POST['updateamount']) && isset($_POST['updatetamilname'])){
            
        $updateid=$_POST['updateid']+1;
        $updatename=$_POST['updatename'];
        $updateamount=$_POST['updateamount'];
        $updatefor=$_POST['updatefor'];
        $updatetamilname=$_POST['updatetamilname'];
        
        // print_r($updateid);
        // print_r($updatename);
        // print_r($updateamount);
        // print_r($updatetamilname);

        if(!$con){
            die("Connection error ".mysqli_connect_error());
        }
        
        if($updatefor=='beverages'){
            $sql ="UPDATE beverages_1 SET itemsname='$updatename',amount=$updateamount, tamilname='$updatetamilname'WHERE id=$updateid";
        }
        else if($updatefor=='nonbeverages'){
            $sql ="UPDATE nonbeverages_1 SET itemsname='$updatename',amount=$updateamount, tamilname='$updatetamilname'WHERE id=$updateid";
        }
        else if($updatefor=='bites'){
            $sql ="UPDATE bites_1 SET itemsname='$updatename',amount=$updateamount, tamilname='$updatetamilname'WHERE id=$updateid";
        }
        else if($updatefor=='juices'){
            $sql ="UPDATE juices_1 SET itemsname='$updatename',amount=$updateamount, tamilname='$updatetamilname'WHERE id=$updateid";
        }
        else if($updatefor=='parcel'){
            $sql ="UPDATE parcel_1 SET itemsname='$updatename',amount=$updateamount, tamilname='$updatetamilname'WHERE id=$updateid";
        }
        
        $result=mysqli_query($con,$sql);
        
        if($result){
            $data["output"]='success';
        }
    }else{
        $data["output"]='faliure';
    }

    echo json_encode($data);       
  ?>