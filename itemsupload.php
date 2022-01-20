<?php 

    // Include the database configuration file  
 
    require_once "dbConfig.php";

    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }
    
    $itemtype=$_POST['addselectitem'];
        $add_item_name=$_POST['add_name'];
        $add_tamil_name=$_POST['add_tamilname'];
        $add_amount=$_POST['add_amount'];
        // $image=$_POST['image'];

    if (!empty($_POST['add_name']) && !empty($_POST['add_tamilname']) && !empty($_POST['add_amount']) && !empty($_POST['addselectitem'])) {
                             
        // Get name of images
        
        // $add_image=$_POST['image'];
                              
        $sql = "SELECT id FROM $itemtype ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($con, $sql);
        $lastid=0;
        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $lastid=$row["id"];
                $lastid=$lastid+1;
            }
        }

        $Get_image_name = $_FILES['image']['name'];
        
        // image Path
        $image_Path = "items/$itemtype/".basename($Get_image_name);
        // $sql="UPDATE beverages set image = '$Get_image_name' where id=20";

        if(move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)){
            $sql="Insert into $itemtype (id,itemsname,amount,buyquantity,sellquantity,totalamount,tamilname,image) values($lastid,'$add_item_name',$add_amount,0,0,0,'$add_tamil_name','$Get_image_name')";
            if (mysqli_query($con, $sql)) {
                $table=$itemtype.'_1';
                $sql="Insert into $table (id,itemsname,amount,buyquantity,sellquantity,totalamount,tamilname,image) values($lastid,'$add_item_name',$add_amount,0,0,0,'$add_tamil_name','$Get_image_name')";
                if (mysqli_query($con, $sql)) {
                    
                    echo "Your item has added successfully";
                }else{
                    echo  "Failed to add 2";
                }
            }else{
                echo  "Failed to add 1";
            }
        }else{
            echo "Please add a image";
        }
        
    }else{
        echo 'Please fill the all values';
    }

?>