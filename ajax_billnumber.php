<?php

        require_once "dbConfig.php";

        $billno=0;
        if(!$con){
            die("Connection error ".mysqli_connect_error());
        }

        $sql = "SELECT billnumber FROM sri_recepit ORDER BY billnumber DESC LIMIT 1";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $billno=$row["billnumber"];
            }
            
        }

        echo $billno;
?>