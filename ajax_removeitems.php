<?php
 
    $output;
    $msg = "Failed";

    require_once "dbConfig.php";
    
    if(isset($_POST['id']) && isset($_POST['type'])){
            
        $id=$_POST['id'];
        $type=$_POST['type'];
        $table=$type.'_1';
        // print_r($id);
        // print_r($type);
        
        if(!$con){
            die("Connection error ".mysqli_connect_error());
        }
        
        $sql="DELETE FROM $type where id=$id";

        $result = mysqli_query($con, $sql);
        
        if($result){

            $sql="DELETE FROM $table where id=$id";

            $result = mysqli_query($con, $sql);

            $sql="select * from $type";
            $res=$con->query($sql);
            
            $beveragesName=array();
            $tamilName=array();
            $id=array();
            $c=0;
            while($row=$res->fetch_assoc()){
                $id[$c]=$row["id"];
                $c++;
            }

            for($c = 0; $c < count($id); $c++)
            {
                $sql="UPDATE $type set id=$c+1  where id=$id[$c]";
                $result = mysqli_query($con, $sql);
                
                $sql="UPDATE $table set id=$c+1  where id=$id[$c]";
                $result = mysqli_query($con, $sql);
            }

            // for($c = 0; $c < count($beveragesName); $c++)
            // {
            //     $output.="<tr><td>".$beveragesName[$c]."</td><td>".$tamilName[$c]."</td><td><button id=$c class='removeselecteditems'>Remove</button></td> </tr>";
            // }
            // echo $output;
            echo "Success";
        }else{
            echo "Failed to remove";
        }
    }else{
        echo $msg;  
    }

       
    
?>