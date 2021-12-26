<?php
        $billno=0;
        $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
        if(!$con){
            die("Connection error ".mysqli_connect_error());
        }

        $sql = "SELECT billnumber FROM sri_recepit_1 ORDER BY billnumber DESC LIMIT 1";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $billno=$row["billnumber"];
            }
            
        }

        echo $billno;
?>