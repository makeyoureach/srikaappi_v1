
<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    $output='ss';
    $message='';
    $total= 0;
    $billno=1;
    $updateid=0;
    $data["output"]='faliure';
    if(isset($_POST['updateamount'])&& isset($_POST['bitesid'])){
            
        $bitesid=$_POST['bitesid'];
        $updateamount=$_POST['updateamount'];

        // print_r($updateid);
        // print_r($updatename);
        // print_r($updateamount);
        // print_r($updatetamilname);

        $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
        if(!$con){
            die("Connection error ".mysqli_connect_error());
        }
        
            $sql ="UPDATE bites SET itemsname='$updatename',amount=$updateamount, tamilname='$updatetamilname'WHERE id=$updateid";
        
        
        $result=mysqli_query($con,$sql);
        
        if($result){
            $data["output"]='success';
        }
    }else{
        $data["output"]='faliure';
    }

    echo json_encode($data);       
  ?>