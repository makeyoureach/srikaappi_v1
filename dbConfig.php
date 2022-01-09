<?php  
// Database configuration  

$conn=mysqli_connect('34.93.221.231','root','root123','srikaappi');
if(!$conn){
    die("Connection error ".mysqli_connect_error());
}

for($i=1;$i<=30;$i++){
    $value=$i.'.jpg';
    echo $value;
    $sql="UPDATE nonbeverages_1 set image = '$value' where id=$i ";
      mysqli_query($conn, $sql);
}
