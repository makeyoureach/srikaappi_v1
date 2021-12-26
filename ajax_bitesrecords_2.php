
<?php

    $output='success';

    if(isset($_POST['updatebuy'])){
            
        $updatebuy=$_POST['updatebuy'];
        $updateid=$_POST['updateid']+1;
        // print_r($updatebuy);

        $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
        if(!$con){
            die("Connection error ".mysqli_connect_error());
        }

        $sql ="UPDATE bites_1 SET buyquantity=$updatebuy WHERE id=$updateid";
        $result=mysqli_query($con,$sql);
        
        if($result){
            $output='success';
        }
    }else{
        $output='faliure';
    }

    echo $output;       
  ?>